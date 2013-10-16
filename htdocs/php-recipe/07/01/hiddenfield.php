<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>隠しフィールドを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo '隠しデータは？： ';
if (isset($_POST['example'])) {
  echo h($_POST['example']);
}
echo '</p><hr>';
?>
<form method="post" action="hiddenfield.php">
<p>隠しデータ
<input type="hidden" name="example" value="PHP逆引きレシピ">
（画面上には表示されません）<br>
<input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
