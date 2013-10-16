<?php
# 必要なファイルを読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../conf/site_conf.php';
require_once '../../../../lib/h.php';

# 認証処理関数です。IDとパスワードを受け、認証がOKならtrueを返します。
function auth($id = '', $password = '')
{
# ここでは、サンプルのためID/パスワードを関数内に記述しています。本来は、
# データベースなどから取得してください。
  if ($id === 'abc' && $password === 'secret') {
    return true;
  } else {
    return false;
  }
}

# HTTP用のセッションIDを取得する関数です。
function getHttpSessionId()
{
  if (isset($_COOKIE['PHPSESSID'])) {
# HTTP用のセッションIDをCookieから取得し変数に代入します。
    $httpSid = $_COOKIE['PHPSESSID'];
  } elseif (isset($_POST['sid'])) {
# HTTP用のセッションIDをPOSTデータから取得し変数に代入します。
    $httpSid = $_POST['sid'];
  } else {
    exit('不正な操作です。');
  }
  
  return $httpSid;
}

# HTTP用のセッションファイル名を取得する関数です。
function getHttpSessionFilename()
{
# HTTP用のセッションIDを取得します。
  $httpSid = getHttpSessionId();
# セッションファイルが保存されているディレクトリを変数に代入します。
  $path = session_save_path() != '' ? session_save_path() : '/tmp';
  $file = $path . '/sess_' . $httpSid;
  
  if (! file_exists($file)) {
    exit('サーバーエラーです。');
  }
  
# HTTP用のセッションファイル名を返します。
  return $file;
}

# HTTP用のセッションデータを$_SESSIONに代入するための関数です。
function getHttpSessionData()
{
# HTTP用のセッションファイルの中身をデコードして$_SESSIONに保存します。
  session_decode(file_get_contents(getHttpSessionFilename()));
}

# $_SESSIONをHTTP用のセッションファイルに保存するための関数です。
function saveToHttpSessionFile()
{
# $_SESSIONのデータをエンコードし変数に代入します。
  $session = session_encode();
# エンコードしたセッションデータをHTTP用のセッションファイルに保存します。
  file_put_contents(getHttpSessionFilename(), $session, LOCK_EX);
}

# HTTP通信の場合はエラーとし終了します。
if (! isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
  exit();
}

# セッション名をHTTPS用のセッション名「secure」に変更します。
session_name('secure');
# セッションCookieにSecure属性を指定します。
ini_set('session.cookie_secure', 1);
session_start();

$msg = '';

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
  $msg = 'ログイン済みです。';
  getHttpSessionData();  // HTTP用のセッションデータを$_SESSIONに代入
} else {
  if (isset($_POST['name'])) {
    // 認証処理
    if (auth($_POST['name'], $_POST['password'])) {
# セッションIDを変更します。
      session_regenerate_id(true);
      getHttpSessionData();  // HTTP用のセッションデータを$_SESSIONに代入
      $_SESSION['name']  = $_POST['name'];
      $_SESSION['login'] = true;
      $_SESSION['sid']   = getHttpSessionId();
      saveToHttpSessionFile();  // $_SESSIONをHTTP用のセッションファイルに保存
      $msg = '認証OK';
    } else {
      $msg = '認証NG';
    }
  }
}

if (! isset($_SESSION['name'])) {
  $_SESSION['name'] = 'ゲスト';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログインページ(SSL)</title>
</head>
<body>
<div>
<?php
if ($msg) {
  echo '<p>' . h($msg) . '</p>';
}
?>
<?php echo h($_SESSION['name']); ?> さん、こんにちは<br>
HTTPセッションID: <?php echo h(getHttpSessionId()); ?><br>
HTTPSセッションID: <?php echo h(session_id()); ?><br>
<form method="post" action="ssl_session_login.php">
  名前: <input type="text" name="name"><br>
  パスワード: <input type="password" name="password"><br>
  <input type="hidden" name="sid" value="<?php echo h(getHttpSessionId()); ?>"><br>
  <input type="submit" value="送信">
</form>
<a href="<?php echo h(BASE_URL . '10/03/ssl_session_http.php'); ?>">戻る</a>
</div>
</body>
</html>
