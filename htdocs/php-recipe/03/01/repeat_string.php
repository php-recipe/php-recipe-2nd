<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字列を繰り返し表示したい</title>
</head>
<body>
<div>
<?php
echo '<p>「*」を15回繰り返す</p>';
echo '<p>' . str_repeat('*', 15) . '</p>';

echo '<p>「_/」を10回繰り返す</p>';
echo '<p>' . str_repeat('_/', 10) . '</p>';
?>
</div>
</body>
</html>
