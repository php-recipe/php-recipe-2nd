<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>非永続的なXSS</title>
</head>
<body>
<div>
<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

if (isset($_GET['username'])) {
  echo $_GET['username'] . 'さん';
} else {
  echo <<<EOL
<form action="xss_non_persistent.php">
お名前: <input type="text" name="username">
<input type="submit">
</form>
EOL;
}
?>
</div>
</body>
</html>
