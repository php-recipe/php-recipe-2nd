<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>タグを取り除きたい</title>
</head>
<body>
<div>
<p>strip_tags()関数でタグを除去する<br>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_POST['example'])) {
  echo h(strip_tags($_POST['example']));
}
?>
</p>
<form method="post" action="strip_tags.php">
  <input type="text" name="example" value="<b>テスト</b>">
  <input type="submit" name="submit" value="送信">
</form>
</div>
</body>
</html>
