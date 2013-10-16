<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>金額にカンマを付けたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# 変数に$_POSTの値を代入します。
$number = isset($_POST['number']) ? $_POST['number'] : '';

# ctype_digit()関数で正の整数および、strlen()関数で4桁以上かどうかを判定します。
if (ctype_digit($number) && (strlen($number) >= 4)) {
# number_format()関数でカンマを付けます。
  echo '<p>' . h(number_format(h($number))) . '</p>';
} elseif ($number != '') {
  echo '<p>金額には4桁以上の正の整数を入力してください。</p>';
}
?>
<form method="post" action="form_number_format.php">
<p>4桁以上の金額を入力してください</p>
<input type="text" name="number" value="">
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
