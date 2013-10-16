<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>テキストボックスに入力候補を表示させたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'テキストボックス（autocomplete属性を指定）： ';
if (isset($_POST['food'])) {
  echo h($_POST['food']);
}
echo '</p><hr>';
?>
<form method="post" action="autocomplete.php">
<p>テキストボックス（autocomplete属性を指定）<br>
<input type="text" name="food" autocomplete="on" list="nagoya">
<input type="submit" value="送信する"></p>
<datalist id="nagoya">
<option value="きしめん">
<option value="味噌煮込みうどん">
<option value="ういろう">
</datalist>
</form>
</div>
</body>
</html>
