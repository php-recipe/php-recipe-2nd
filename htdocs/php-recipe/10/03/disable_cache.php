<?php
header(
  'Cache-Control: no-store, no-cache, private, max-age=0, must-revalidate, '
  . 'post-check=0, pre-check=0'
);
header('Pragma: no-cache');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>キャッシュされないページ</title>
</head>
<body>
<div>
非公開情報。
</div>
</body>
</html>
