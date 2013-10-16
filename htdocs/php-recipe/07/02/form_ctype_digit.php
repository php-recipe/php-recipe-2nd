<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>数値かどうかをチェックしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_POST['number'])) {
  $number = $_POST['number'];

  echo '<p>ctype_digit()関数:</p>';
  if (ctype_digit($number)) {
    echo h($number) . 'は数値です。';
  } else {
    echo h($number) . 'は数値ではありません。';
  }

  echo '<p>is_numeric()関数:</p>';
  if (is_numeric($number)) {
    echo h($number) . 'は数値です。';
  } else {
    echo h($number) . 'は数値ではありません。';
  }
}
?>
<form method="post" action="form_ctype_digit.php">
<p>数字を入力してください</p>
<input type="text" name="number" value="">
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
