<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>改行タグを改行文字の前に挿入したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_POST['textarea'])) {
  $string =  $_POST['textarea'];
  echo '元文字列：<p>' . h($string) . '</p>';
  echo '改行タグ挿入後：<p>' . nl2br(h($string), false) . '</p>';
}
?>
<form method="post" action="nl2br.php">
<p>文字を入力してください</p>
<textarea name="textarea" rows="3" cols="20"></textarea>
<br>
<input type="submit" value="送信">
</form>
</div>
</body>
</html>
