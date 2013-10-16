<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>データ入力時のみデータを処理するには？</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$example = isset($_POST['example']) ? $_POST['example'] : null;

if (strlen($example) > 0) {
  echo '<p>データを受け取りました: ' . h($example) . '</p>';
} else {
  echo '<p>データを受け取っていません</p>';
}
?>
<form method="post" action="form_strlen.php">
<p>テキストボックス</p>
<input type="text" name="example" value="<?php echo h($example); ?>">
<input type="submit" value="送信">
</form>
</div>
</body>
</html>
