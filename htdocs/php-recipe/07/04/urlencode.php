<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>URLの一部に日本語を利用したい</title>
</head>
<body>
<div>
<form method="get" action="urlencode.php">
<p>文字列を入力し、リンクをクリックします<br>
<input type="text" name="data">
<input type="submit" value="送信">
</p>
</form>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_GET['data'])) {
  $string = $_GET['data'];

# URLエンコードします。
  $urlEncode = rawurlencode($_GET['data']);
  $url = $_SERVER['SCRIPT_NAME'] . '?data2=' . $urlEncode;
  echo '元文字列： ' . h($string) . '<br>';
  echo 'エンコード処理後： ' . h($urlEncode) . '<br>';
  echo '<a href="' . h($url) . '">リンク</a>';
}

if (isset($_GET['data2'])) {
  $string = $_GET['data2'];
  echo 'デコード処理後： ' . h($string);
}
?>
</div>
</body>
</html>
