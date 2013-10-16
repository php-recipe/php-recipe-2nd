<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ファイルの拡張子をチェックしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_FILES['example']['name']) && $_FILES['example']['name'] != '') {
  $localFilename = basename($_FILES['example']['name']);
  $pathinfo = pathinfo($localFilename);
  if (isset($pathinfo['extension'])) {
    echo '<p>「' . h($localFilename) . '」の拡張子: ';
    echo h($pathinfo['extension']) . '</p>';
  } else {
    echo '<p>「' . h($localFilename) . '」の拡張子はありません</p>';
  }
}
?>
<p>ファイルを指定してください</p>
<form method="post" action="form_pathinfo.php" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="example">
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
