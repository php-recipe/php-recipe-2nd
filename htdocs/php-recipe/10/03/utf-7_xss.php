<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

# Content-Typeヘッダーで正しい文字エンコードをわざと送らないように設定します。
ini_set('default_charset', '');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>UTF-7 XSS</title>
</head>
<body>
<div>
<?php
$input = isset($_GET['input']) ? $_GET['input'] : '';
echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
?>
</div>
</body>
</html>
