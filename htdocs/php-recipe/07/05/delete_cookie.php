<?php
# Cookieを削除します。
setcookie('sample', '', time() - 3600, '/');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Cookieを削除したい</title>
</head>
<body>
<div>
<p>Cookieを削除しました。</p>
<p><a href="print_cookie.php">Cookieの中身を表示する</a></p>
</div>
</body>
</html>
