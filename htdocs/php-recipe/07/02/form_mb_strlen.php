<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>文字数や桁数をチェックしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# 変数に$_POSTの値を代入します。
$example = isset($_POST['example']) ? $_POST['example'] : '';

if (strlen($example) > 0) {
# 半角数字かどうかをチェックします☆レシピ207☆（数値かどうかをチェックしたい）。
  if (ctype_digit($example)) {
    echo '<p>「' . h($example) . '」は' . h(strlen($example)) . '桁です。</p>';
  } else {
    echo '<p>「' . h($example) . '」は' . h(mb_strlen($example)) . '文字です。</p>';
  }
}
?>
<form method="post" action="form_mb_strlen.php">
<p>文字か数字を入力してください</p>
<input type="text" name="example" value="">
<input type="submit" value="送信">
</form>
</div>
</body>
</html>
