<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>strip_tags()関数のXSS脆弱性</title>
</head>
<body>
<div>
<?php
$text = <<<EOL
<script>alert('xss1')</script>
<b onmouseover="javascript: alert('xss2')">ここにマウスを載せてください</b>
EOL;

echo strip_tags($text, '<b>');
?>
</div>
</body>
</html>
