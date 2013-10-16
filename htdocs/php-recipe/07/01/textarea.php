<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>テキストエリアを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'テキストエリア1（cols属性に50、rows属性に3を指定）： ';
if (isset($_POST['example1'])) {
  echo nl2br(h($_POST['example1']), false);
}
echo '<br>テキストエリア2（cols属性に50、rows属性に3、maxlength属性に30を指定）： ';
if (isset($_POST['example2'])) {
  echo nl2br(h($_POST['example2']), false);
}
echo '<br>テキストエリア3（disabledでボックスを無効化する）： ';
if (isset($_POST['example3'])) {
  echo nl2br(h($_POST['example3']), false);
}
echo '<br>テキストエリア4（readonlyで書き換えを禁止する）： ';
if (isset($_POST['example4'])) {
  echo nl2br(h($_POST['example4']), false);
}
echo '</p><hr>';
?>
<form method="post" action="textarea.php">
<p>テキストエリア1（cols属性に50、rows属性に3を指定）</p>
<textarea name="example1" cols="50" rows="3">サンプル1</textarea>
<p>テキストエリア2（cols属性に50、rows属性に3、maxlength属性に30を指定）</p>
<textarea name="example2" cols="50" rows="3" maxlength="30">サンプル2</textarea>
<p>テキストエリア3（disabledでボックスを無効化する）</p>
<textarea name="example3" cols="50" rows="3" disabled>サンプル3</textarea>
<p>テキストエリア4（readonlyで書き換えを禁止する）</p>
<textarea name="example4" cols="50" rows="3" readonly>サンプル4</textarea>
<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
