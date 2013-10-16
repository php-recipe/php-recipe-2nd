<?php
# Content-Typeヘッダーを送信します。
header('Content-Type: image/png');
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');

# 画像を作成します。
$image = imagecreatetruecolor(400, 300);

# 画像の背景色に赤色を設定します。
// 第2～4引数をRGB（Red,Green,Blue）の1つずつを0～255の整数で指定
$bg_color = imagecolorallocate($image, 255, 0, 0);
imagefill($image, 0, 0, $bg_color);

# 画像をブラウザに出力します。
imagepng($image);

# 画像を破棄しメモリを解放します。
imagedestroy($image);

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
