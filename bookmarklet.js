// send_bookmarklet.js

javascript: void((function(undefined) {
    var f = document.createElement('form');
    document.body.appendChild(f);

    var title = document.title;
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'title');
    input.setAttribute('value', title);
    f.appendChild(input);

    var uri = location.href;
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'uri');
    input.setAttribute('value', uri);
    f.appendChild(input);

    f.method = 'POST';
    f.target = '_blank';
    f.action = 'https://www.catch.jp/program/copy-taro/index.php';
    f.submit();
})());