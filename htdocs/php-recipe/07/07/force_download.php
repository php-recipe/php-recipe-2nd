<?php
$fileName = 'force_download.jpg'; // ダウンロード対象のファイル名
$fileSize = filesize($fileName);
$mime = 'image/jpeg';
//$mime = 'application/octet-stream'; // MIMEタイプが不明な場合

header('Content-Type: ' . $mime);
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: no-store, no-cache, must-revalidate');
# Internet Explorerと他のブラウザで処理を分けます。
# このサンプルは、IE6〜10でも動作することを確認しています。
if (isset($_SERVER['HTTP_USER_AGENT']) && 
    strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
  header('Cache-Control: post-check=0, pre-check=0', false);
  header('Pragma: public');
} 
header('Content-Length: ' . $fileSize);

readfile($fileName);
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
