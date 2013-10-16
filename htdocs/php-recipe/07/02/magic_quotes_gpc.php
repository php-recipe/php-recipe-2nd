<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>magic_quotes_gpcの影響を受けないコード</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

function safeStripSlashes($var)
{
  if (is_array($var)) {
    return array_map('safeStripSlashes', $var);
  } else {
    if (get_magic_quotes_gpc()) {
      $var = stripslashes($var);
    }
    return $var;
  }
}

# $_POST配列をsafeStripSlashes()関数で処理し、安全に「\」を削除します。
$_POST = safeStripSlashes($_POST);

echo '<p>入力された値:</p>';
if (isset($_POST['example'])) {
  echo h($_POST['example']);
}
echo '<br>';
?>
<form method="post" action="magic_quotes_gpc.php">
<p>入力してください</p>
<input type="text" name="example" value="">
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
