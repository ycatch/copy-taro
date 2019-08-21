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
            <p>ページタイトルとアドレスをフォームに表示します。</p>

            <h2>取り出した情報</h2>
            <textarea rows=15 cols=80><?php
                if(!empty($_POST)) {
                    foreach($_POST as $key => $value) {
                        $str = htmlspecialchars($value, ENT_QUOTES);
                        echo "${str}\n";
                    }
                } else {
                    echo "I have not received data.";
                }?>
            </textarea>

            <h2>使い方</h2>

            <a class="button" href="javascript:void((function(undefined){var f=document.createElement('form');document.body.appendChild(f);var title=document.title;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','title');input.setAttribute('value',title);f.appendChild(input);var uri=location.href;var input=document.createElement('input');input.setAttribute('type','hidden');input.setAttribute('name','uri');input.setAttribute('value',uri);f.appendChild(input);f.method='POST';f.target='_blank';f.action='https://www.catch.jp/program/copy-taro/index.php';f.submit()})());">Webコピ太郎</a>
            <ul>
            <li>「Webコピ太郎」ボタンをクリックすると、ページタイトルとアドレスをフォームに表示します。</li>
            <li>ブックマークツールバーに、このボタンをドラッグ＆ドロップしておくと、他のWebページでも情報を取り出せます。</li>
            </ul>

            <h2>ソースコード</h2>
            <p>
                <a href="https://github.com/ycatch/copy-taro">
                    Link to Github
                </a>
            <p>
        </section>
    </main>
</body>
</html>