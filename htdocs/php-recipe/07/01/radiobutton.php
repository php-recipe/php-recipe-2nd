<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ラジオボタンを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'ラジオボタン： ';
if (isset($_POST['example1'])) {
  echo h($_POST['example1']);
}
echo '</br>ラジオボタン（checked属性で女を選択する）： ';
if (isset($_POST['example2'])) {
  echo h($_POST['example2']);
}
echo '<br>ラジオボタン（disabled属性で男を無効化する）： ';
if (isset($_POST['example3'])) {
  echo h($_POST['example3']);
}
echo '</p><hr>';
?>
<form method="post" action="radiobutton.php">
<p>ラジオボタン
<input type="radio" name="example1" value="男1">男
<input type="radio" name="example1" value="女1">女</p>
<p>ラジオボタン(checked属性で女を選択する)
<input type="radio" name="example2" value="男2">男
<input type="radio" name="example2" value="女2" checked>女</p>
<p>ラジオボタン(disabled属性で男を無効化する)
<input type="radio" name="example3" value="男3" disabled>男
<input type="radio" name="example3" value="女3">女</p>
<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
