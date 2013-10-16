<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>複数選択可能なセレクトメニューやチェックボックスの値を受け取りたい</title>
</head>
<body>
<div>
<p>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_POST['sample1'])) {
  for ($i = 0; $i < count($_POST['sample1']); $i++) {
    echo 'セレクトボックスの値は： ' . h($_POST['sample1'][$i]) . 'です<br>';
  }
}
if (isset($_POST['sample2'])) {
  for ($i = 0; $i < count($_POST['sample2']); $i++) {
    echo 'チェックボックスの値は： ' . h($_POST['sample2'][$i]) . 'です<br>';
  }
}
?>
</p>
<form method="post" action="multi_select.php">
<p>セレクトメニュー</p>
<select name="sample1[]" size="5" multiple>
<option value="サンプル1">サンプル1</option>
<option value="サンプル2">サンプル2</option>
<option value="サンプル3">サンプル3</option>
</select>
<br>
<p>チェックボックス</p>
<input type="checkbox" name="sample2[]" value="その1"> その1
<input type="checkbox" name="sample2[]" value="その2"> その2
<input type="checkbox" name="sample2[]" value="その3"> その3
<br>
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
