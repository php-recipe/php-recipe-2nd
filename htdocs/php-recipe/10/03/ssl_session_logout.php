<?php
if (! isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
  exit();
}

session_name('secure');
ini_set('session.cookie_secure', 1);
session_start();

// HTTP用セッションの削除
if (isset($_COOKIE['PHPSESSID'])) {
  setcookie('PHPSESSID', '', time()-42000, '/');
}
deleteHttpSessionFile();

// HTTPS用セッションの削除
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

# HTTP用のセッションファイルを削除する関数です。
function deleteHttpSessionFile()
{
  if (isset($_SESSION['sid'])) {
    $httpSid = $_SESSION['sid'];
  } else {
    exit('不正な操作です。');
  }
# セッションファイルが保存されているディレクトリを変数に代入します。
  $path = session_save_path() != '' ? session_save_path() : '/tmp';
  $file = $path . '/sess_' . $httpSid;
  
  if (file_exists($file)) {
    unlink($file);
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログアウト(SSL)</title>
</head>
<body>
<div>
ログアウトしました。
</div>
</body>
</html>
