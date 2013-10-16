<?php
header('Content-Type: application/xml');
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
echo <<<EOL
<?xml version="1.0" encoding="UTF-8"?>
<data>
<title>PHP逆引きレシピ</title>
</data>
EOL;
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
