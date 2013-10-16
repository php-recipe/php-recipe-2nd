<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>正規表現による複雑な文字列の置き換えをしたい</title>
</head>
<body>
<div>
<?php
# 元の文字列を設定します。
$text = <<<EOL
クレジットカード番号：1234 5678 9012 3456
電話番号：090-1234-5678
備考：特になし
EOL;
echo '<p>元の文字列：</p>';
echo '<pre>' . $text . '</pre>';

# クレジットカード番号を****で置き換えます。
$replaced = mb_ereg_replace('\d{4} ?\d{4} ?\d{4} ?\d{4}', '****', $text);

# 電話番号を****で置き換えます。
$replaced = mb_ereg_replace('0\d{1,4}-?\d{1,4}-?\d{4}', '****', $replaced);

# 結果を表示します。
echo '<p>置き換え後：</p>';
echo '<pre>' . $replaced . '</pre>';
?>
</div>
</body>
</html>
