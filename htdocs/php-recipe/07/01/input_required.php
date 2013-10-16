<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>HTMLで必須入力のチェックをしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'お名前： ';
if (isset($_POST['name'])) {
  echo h($_POST['name']);
}
echo '<br>性別： ';
if (isset($_POST['gender'])) {
  echo h($_POST['gender']);
}
echo '</p><hr>';
?>
<form method="post" action="input_required.php">
<p>お名前
<input type="text" name="name" required></p>
<p>性別</p>
<select name="gender" required>
<option></option>
<option value="男性">男性</option>
<option value="女性">女性</option>
</select>
<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
