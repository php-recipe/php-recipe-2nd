<?php
# 必要なファイルを読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../conf/site_conf.php';
require_once '../../../../lib/h.php';

session_start();

if (! isset($_SESSION['name'])) {
  $_SESSION['name'] = 'ゲスト';
}

# HTTPSのログインページのURLを生成します。
$url = SSL_URL . '10/03/ssl_session_login.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>非SSLページ</title>
</head>
<body>
<div>
<?php echo h($_SESSION['name']); ?> さん、こんにちは<br>
HTTPセッションID: <?php echo h(session_id()); ?><br>
<form method="post" action="<?php echo h($url); ?>">
  <input type="hidden" name="sid" value="<?php echo h(session_id()); ?>"><br>
  <input type="submit" value="次へ">
</form>
</div>
</body>
</html>
