<!doctype html>
<html lang="ja">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yutaka Kachi">
    <meta name="description" content="Webページの要素をコピペしやすくするツールです">

    <title>Webコピ太郎</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
    <link rel="stylesheet" href="css/milligram.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <main class="wrapper">

        <section class="container">

            <h1>Webコピ太郎</h1>
            <p>Webページの要素をコピペしやすくするツールです。</p>
            <p>いま見ているページのタイトルとアドレスを、フォームにまとめて表示します。</p>
            
            <h2>取得した情報</h2>
            <?php
                if(empty($_POST)) {
                    $output = "This time I don't have any information.";
                } else {
                    $output = "";
                    foreach($_POST as $key => $value) {
                        if ($key == "title") {
                            $value = mb_convert_encoding($value, "UTF-8", "auto");
                            $pageTitle = htmlspecialchars($value, ENT_QUOTES);
                            echo '<div>ページタイトル：<span id="pageTitle">' . rtrim($pageTitle) . '</span></div>';
                        } else {
                            $pageAddress = htmlspecialchars($value, ENT_QUOTES);
                            echo '<div>アドレス：<span id="pageAddress">' . rtrim($pageAddress) . '</span></div>';
                        }
                    }
                    $output = $pageTitle . "\n" . $pageAddress;
                }
            ?>

            <hr>

            <h3>フォーマット</h3>
            <form>
                <input type="radio" name="format" value="0" checked> テキスト 
                <input type="radio" name="format" value="1"> Markdown-List 
                <input type="radio" name="format" value="2"> Markdown-Link 
                <input type="radio" name="format" value="3"> HTML 

                <textarea id="copyArea" class="js-copytext" rows=15 cols=80><?php echo rtrim($output); ?></textarea>
                <p>
                    <a class="button" data-clipboard-target="#copyArea" href="#">クリップボードにコピー </a>
                </p>
            </form>

            <hr>

            <h2>情報を取得する</h2>

            <a class="button" href="javascript:void((function(undefined){var f=document.createElement('form');document.body.appendChild(f);var title=document.title;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','title');input.setAttribute('value',title);f.appendChild(input);var uri=location.href;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','uri');input.setAttribute('value',uri);f.appendChild(input);f.method='POST';f.target='_blank';f.action='https://www.catch.jp/program/copy-taro/index.php';f.submit()})());">Webコピ太郎ブックマークレット</a>

            <hr>

            <h3>使い方</h3>
            <ul>
            <li>「Webコピ太郎ブックマークレット」ボタンをクリックすると、ページタイトルとアドレスをフォームに表示します。</li>
            <li>ブックマークツールバーに、このボタンをドラッグ＆ドロップしておくと、他のWebページでも同じように情報を取り出せます。</li>
            <li>ボタンを右クリック > 「リンクをブックマーク」でもOK</li>
            </ul>

            <hr>

            <h2>関連情報</h2>
            <div>
                <ul>
                    <li><a href="https://github.com/ycatch/copy-taro">Github</a></li>
                    <li><a href="https://github.com/ycatch/copy-taro/blob/master/index.php">このページのソース</a></li>
                    <li><a href="https://github.com/ycatch/copy-taro/blob/master/bookmarklet.js">ブックマークレット</a></li>
                </ul>
                
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script>
    var clipboard = new ClipboardJS('.button');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
    </script>

    <script>
        window.onload = function() {

            let pageTitle = document.getElementById('pageTitle');
            let pageAddress = document.getElementById('pageAddress');
            let copyArea = document.getElementById('copyArea');
            let checkOption = document.getElementsByName('format');
            
            checkOption.forEach(function(event) {
                event.addEventListener("click", function() {
                    let format_value = document.querySelector("input:checked[name=format]").value; 
                    switch(Number(format_value)) {
                        case 0: // Planetext
                            setFormat(pageTitle.innerText + "\n" + pageAddress.innerText);
                            break;
                        case 1: // markdown-List
                            setFormat("- " + pageTitle.innerText + "\n" + "  " + pageAddress.innerText);
                            break;
                        case 2: // markdown-Link
                            setFormat("[" + pageTitle.innerText + "](" + pageAddress.innerText + ")");
                            break;
                        case 3:
                            setFormat("<a href='" + pageAddress.innerText + "'>" + pageTitle.innerText + "</a>");
                            break;
                        default:
                            //Don't call this
                            setFormat(format_value + pageTitle.innerText + "\n" + "default"); 
                    }
                });
            });

            let setFormat = function(format_text) {
                copyArea.value = format_text;
            };
        };
    </script>
</body>
</html>