<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>テキストボックスにプレースホルダを表示させたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'テキストボックス（初期値を指定）： ';
if (isset($_POST['example1'])) {
  echo h($_POST['example1']);
}
echo '<br>テキストボックス（プレースホルダを指定）： ';
if (isset($_POST['example2'])) {
  echo h($_POST['example2']);
}
echo '</p><hr>';
?>
<form method="post" action="placeholder.php">
<p>テキストボックス（初期値を指定）
<input type="text" name="example1" value="PHP逆引きレシピ"></p>
<p>テキストボックス（プレースホルダを指定）
<input type="text" name="example2" placeholder="キーワードを入力"></p>
<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
