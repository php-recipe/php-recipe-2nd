<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# セッションを開始します。
session_start();

# セッション変数を登録します。
$_SESSION['date'] = '2013年06月23日 05時10分55秒';
$_SESSION['user'] = 'user';
$_SESSION['sample'] = 'PHP逆引きレシピ';
# セッション変数を別の変数に保存しておきます。
$oldSession = $_SESSION;

# セッション変数はメモリ内に残っているので、セッション変数をarray()で要素数0の
# 配列として初期化します。
$_SESSION = array();

# セッションCookieも削除します。
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 3600, '/');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>セッションを破棄したい</title>
</head>
<body>
<div>
<?php
echo '<p>破棄前のセッション情報:</p>';
echo '<pre>';
print_r(h($oldSession));
echo '</pre>';

# セッションを破棄します。
session_destroy();

echo '<p>破棄後のセッション情報:</p>';
echo '<pre>';
print_r(h($_SESSION));
echo '</pre>';
?>
</div>
</body>
</html>
