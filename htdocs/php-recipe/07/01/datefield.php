<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>日付フィールドを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo '日付は？： ';
if (isset($_POST['date'])) {
  echo h($_POST['date']);
}
echo '</p><hr>';
?>
<form method="post" action="datefield.php">
<p>日付
<input type="date" name="date">
<input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
