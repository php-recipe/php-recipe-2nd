<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>日時の文字化け</title>
</head>
<body>
<div>
<?php
# ロケールでの文字エンコード指定をわざとEUC-JPにします。
setlocale(LC_ALL, 'ja_JP.eucjp');
//setlocale(LC_ALL, 'Japanese_Japan.20932');  // WindowsでEUC-JPの場合

# 現在のロケール設定を表示します。
echo setlocale(LC_ALL, 0) . '<br><br>';

echo '現在の曜日: ' . strftime('%A') . '<br>';
echo '現在の月: '   . strftime('%B') . '<br>';
echo '現在の日時: ' . strftime('%c') . '<br>';
?>
</div>
</body>
</html>
