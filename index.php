<!doctype html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yutaka Kachi">
    <meta name="description" content="copy and paste elements from web page.">

    <title>Web copy-taro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
    <link rel="stylesheet" href="css/milligram.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <main class="wrapper">

        <section class="container">

            <h1>Web copy-taro</h1>
            <p>copy and paste elements from web page.</p>
            <p>Webコピ太朗は、Webページの要素をコピペするツールです。</p>

            <h2>Recive info.</h2>
            <textarea rows=15 cols=80><?php
                if(isset($_POST)) {
                    foreach($_POST as $key => $value) {
                        echo "${value}\n";
                    }
                } else {
                    echo "I have not received data.";
                }?>
            </textarea>

            <p><a href="https://github.com/ycatch/copy-taro">Link to Github<p>
        </section>
    </main>
</body>

</html>