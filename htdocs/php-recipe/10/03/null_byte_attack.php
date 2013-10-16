<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>nullバイト攻撃</title>
</head>
<body>
<div>
<?php
error_reporting(E_ALL & ~E_DEPRECATED);

if (isset($_GET['u'])) {
  $username = $_GET['u'];

  if (ereg('[^A-Za-z0-9]', $username)) {
    die('ユーザー名が不正です。');
  }

  echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
