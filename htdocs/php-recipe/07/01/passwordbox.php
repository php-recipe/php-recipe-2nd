<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>パスワードボックスを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'パスワードボックス： ';
if (isset($_POST['example1'])) {
  echo h($_POST['example1']);
}
echo '<br>パスワードボックス（size属性で30を指定）： ';
if (isset($_POST['example2'])) {
  echo h($_POST['example2']);
}
echo '<br>パスワードボックス（size属性で30、maxlength属性で10を指定）： ';
if (isset($_POST['example3'])) {
  echo h($_POST['example3']);
}
echo '<br>パスワードボックス（pattern属性を指定）： ';
if (isset($_POST['example4'])) {
  echo h($_POST['example4']);
}
echo '<br>パスワードボックス（disabledでボックスを無効化する）： ';
if (isset($_POST['example5'])) {
  echo h($_POST['example5']);
}
echo '<br>パスワードボックス（readonlyで書き換えを禁止する）： ';
if (isset($_POST['example6'])) {
  echo h($_POST['example6']);
}
echo '</p><hr>';
?>
<form method="post" action="passwordbox.php">
<p>パスワードボックス
<input type="password" name="example1" value=""></p>
<p>パスワードボックス（size属性で30を指定）
<input type="password" name="example2" size="30" value=""></p>
<p>パスワードボックス（size属性で30、maxlength属性で10を指定）
<input type="password" name="example3" size="30" maxlength="10" value=""></p>
<p>パスワードボックス（pattern属性を指定）
<input type="password" name="example4" pattern="[0-9A-Za-z]{8,}" value=""></p>
<p>パスワードボックス（disabledでボックスを無効化する）
<input type="password" name="example5" value="12345678" disabled></p>
<p>パスワードボックス（readonlyで書き換えを禁止する）
<input type="password" name="example6" value="12345678" readonly></p>
<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
