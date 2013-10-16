<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>URLの構成要素を解析したい</title>
</head>
<body>
<div>
<pre>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$url = 'http://uzer:p-sw-d@www.example.jp/path/abc/?arg1=val1&arg2=val2#anchor';
print_r(h(parse_url($url)));
?>
</pre>
</div>
</body>
</html>
