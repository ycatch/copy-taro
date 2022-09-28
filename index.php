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
            <p>Webページの要素がコピペしやすくなるツールです。</p>
            <p>いま見ているページのタイトルとアドレスを整形して表示します。</p>

            <nav> | <a href="#info">取得した情報</a>
                  | <a href="#format">フォーマットを変える</a>
                  | <a href="#bookmarklet">ブックマークレット</a>
                  | <a href="#usage">使い方</a>
                  | <a href="#relations">関連情報</a>
                  | </nav>
            <hr>
            <h2 id="info">実際に取得した情報</h2>
            <?php
                if(empty($_POST)) {
                    $output = "This time I don't have any information.";
                } else {
                    $output = "";
                    foreach($_POST as $key => $value) {
                        if ($key == "title") {
                            $value = mb_convert_encoding($value, "UTF-8", "auto");
                            $pageTitle = htmlspecialchars($value, ENT_QUOTES);
                            echo '<div>タイトル：<span id="pageTitle">' . rtrim($pageTitle) . '</span></div>';
                        } else {
                            $pageAddress = htmlspecialchars($value, ENT_QUOTES);
                            echo '<div>アドレス：<span id="pageAddress">' . rtrim($pageAddress) . '</span></div>';
                        }
                    }
                    $output = $pageTitle . "\n" . $pageAddress;
                }
            ?>

            <hr>
            <h2 id="format">フォーマットを変える</h2>
            <form>
                <textarea id="copyArea" class="js-copytext" rows=20 cols=80><?php echo rtrim($output); ?></textarea>
                <label><input type="radio" name="format" value="0" checked> テキスト</label>
                <label><input type="radio" name="format" value="1"> Markdown - List</label>
                <label><input type="radio" name="format" value="2"> Markdown - Link</label>
                <label><input type="radio" name="format" value="3"> HTML</label>
                <p>
                    <a class="button" data-clipboard-target="#copyArea" href="#">クリップボードにコピー </a>
                </p>
            </form>
        </section>

        <section class="container">
            <h2 id="bookmarklet">Webコピ太郎 ブックマークレット</h2>
            <a class="button" href="javascript:void((function(undefined){var f=document.createElement('form');document.body.appendChild(f);var title=document.title;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','title');input.setAttribute('value',title);f.appendChild(input);var uri=location.href;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','uri');input.setAttribute('value',uri);f.appendChild(input);f.method='POST';f.target='_blank';f.action='https://www.catch.jp/program/copy-taro/index.php';f.submit()})());">情報を取得する</a>

            <hr>

            <h2 id="usage">使い方</h2>
            <ul>
                 <li>Webコピ太郎 ブックマークレットは、ブラウザのブックマークツールバーに配置して使います</li>
                 <li>「情報を取得する」ボタンをクリックすると、ページのタイトルとアドレスを整形して表示します。このページでも、他のページでも動作します</li>
                <li>このボタンは、ドラッグ＆ドロップでブックマークツールバーに配置できます</li>
                <li>ボタンを右クリック > 「リンクをブックマーク」でも配置できます</li>
            </ul>

            <img src="./screenshot.png">
        </section>
        
        <section class="container">
            <h2 id="relations">関連情報</h2>

            <h3>ソースコード</h3>

            <ul>
                <li><a href="https://github.com/ycatch/copy-taro" target="_blank">Github</a></li>
                <li><a href="https://github.com/ycatch/copy-taro/blob/master/index.php" target="_blank">このページのソース</a></li>
                <li><a href="https://github.com/ycatch/copy-taro/blob/master/bookmarklet.js" target="_blank">ブックマークレットのソース</a></li>
            </ul>

            <h3>関連ツール</h3>

            <ul>
                <li><a href="https://milligram.io/" target="_blank">Milligram.css</a></li>
                <li><a href="https://clipboardjs.com/" target="_blank">clipboard.js</a></li>
            </ul>

        </section>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script src="./clip_format.js"></script>
    <script src="./format.js"></script>
</body>
</html>