<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>チェックボックスを使いたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

echo '<p>結果<br>';
echo 'チェックボックス： ';
if (isset($_POST['example1-1'])) {
  echo h($_POST['example1-1']) . ' ';
}
if (isset($_POST['example1-2'])) {
  echo h($_POST['example1-2']);
}
echo '<br>チェックボックス（配列）： ';
if (isset($_POST['example2'])) {
  foreach ($_POST['example2'] as $value) {
    echo h($value) . ' ';
  }
}
echo '<br>チェックボックス（checked属性でノートを選択する）： ';
if (isset($_POST['example3'])) {
  foreach ($_POST['example3'] as $value) {
    echo h($value) . ' ';
  }
}
echo '<br>チェックボックス（disabled属性でボックスを無効化する： ';
if (isset($_POST['example4'])) {
  foreach ($_POST['example4'] as $value) {
    echo h($value) . ' ';
  }
}
echo '</p><hr>';
?>
<form method="post" action="checkbox.php">
<p>チェックボックス<br>
<input type="checkbox" name="example1-1" value="デスクトップ">デスクトップ
<input type="checkbox" name="example1-2" value="ノート">ノート</p>
<p>チェックボックス（配列）<br>
<input type="checkbox" name="example2[]" value="デスクトップ">デスクトップ
<input type="checkbox" name="example2[]" value="ノート">ノート</p>
<p>チェックボックス（checked属性でノートを選択する）<br>
<input type="checkbox" name="example3[]" value="デスクトップ">デスクトップ
<input type="checkbox" name="example3[]" value="ノート" checked>ノート</p>
<p>チェックボックス（disabled属性でボックスを無効化する）<br>
<input type="checkbox" name="example4[]" value="デスクトップ"
  checked disabled>デスクトップ
<input type="checkbox" name="example4[]" value="ノート" disabled>ノート</p>
<p><input type="submit" value="送信する"></p>
</form>
</div>
</body>
</html>
