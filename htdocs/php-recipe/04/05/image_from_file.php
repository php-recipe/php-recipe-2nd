<?php
# 既存の画像ファイルを設定します。
$fileName = '../../../../data/imagecreatefrompng.png';
if (! file_exists($fileName)) {
  die('ファイルが存在しません。');
}

# Content-Typeヘッダーを送信します。
header('Content-Type: image/png');
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');

# 既存ファイルから画像を作成します。
$image = imagecreatefrompng($fileName);

# 画像をブラウザに出力します。
imagepng($image);

# 画像を破棄しメモリを解放します。
imagedestroy($image);

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
