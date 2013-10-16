<?php
# 認証を要求したいページの先頭に以下を記述します。
require_once './easyloginform_login.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>簡単なログインフォームを作成したい</title>
</head>
<body>
<div>
  <p><?php echo h($_SESSION['username']); ?>さんいらっしゃい！</p>
  <p>ログインした方のみが閲覧できます！</p>
  <p><a href="easyloginform_logout.php">ログアウトする</a></p>
</div>
</body>
</html>
