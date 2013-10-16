<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ボタンを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'ラジオボタンの値： ';
if (isset($_POST['example1'])) {
  echo h($_POST['example1']);
}
echo '<br>テキストボックスの値： ';
if (isset($_POST['example2'])) {
  echo h($_POST['example2']);
}
echo '</p><hr>';
?>
<form method="post" action="input_submit.php">
<p>ラジオボタン
<input type="radio" name="example1" value="男">男&nbsp;
<input type="radio" name="example1" value="女">女</p>
<p>テキストボックス
<input type="text" name="example2" size="30"></p>
<p>
<input type="submit" value="送信する">&nbsp;
<input type="reset" value="リセット"></p>
</form>
</div>
</body>
</html>
