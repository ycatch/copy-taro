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

            <h2>見ていたページ</h2>
            <?php
                if(!empty($_POST)) {
                    $output = "";
                    foreach($_POST as $key => $value) {
                        if ($key == "title") {
                            $value = mb_convert_encoding($value, "UTF-8", "auto");
                        }
                        $output = $output.htmlspecialchars($value, ENT_QUOTES)."\n";
                    }
                } else {
                    $output = "This time I don't have any information.";
                }
            ?>
            <form>
                <textarea id="copy-area" class="js-copytext" rows=15 cols=80><?php echo rtrim($output); ?></textarea>
                <a class="button" data-clipboard-target="#copy-area" href="#">
                クリップボードにコピー
                </a>
            </form>

            <h2>使い方</h2>

            <a class="button" href="javascript:void((function(undefined){var f=document.createElement('form');document.body.appendChild(f);var title=document.title;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','title');input.setAttribute('value',title);f.appendChild(input);var uri=location.href;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','uri');input.setAttribute('value',uri);f.appendChild(input);f.method='POST';f.target='_blank';f.action='https://www.catch.jp/program/copy-taro/index.php';f.submit()})());">Webコピ太郎</a>

            <ul>
            <li>「Webコピ太郎」ボタンをクリックすると、ページタイトルとアドレスをフォームに表示します。</li>
            <li>ブックマークツールバーに、このボタンをドラッグ＆ドロップしておくと、他のWebページでも情報を取り出せます。</li>
            <li>ボタンを右クリック > 「リンクをブックマーク」でもOK</li>
            </ul>

            <h2>ソースコード</h2>
            <p>
                <a href="https://github.com/ycatch/copy-taro">
                    Link to Github
                </a>
            <p>
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
</body>
</html>