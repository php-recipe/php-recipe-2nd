<?php
mb_http_output('SJIS');
ob_start('mb_output_handler');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="Shift_JIS">
<title>Shift_JISでの出力</title>
</head>
<body>
<div>
このPHPスクリプトはUTF-8ですが、出力はShift_JISです。
</div>
</body>
</html>
