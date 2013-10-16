<?php
# Content-Typeヘッダーを送信します。
header('Content-Type: image/png');
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');

# 画像を作成します。
$image = imagecreatetruecolor(400, 300);
# 背景色を灰色に設定します。
$bg_color = imagecolorallocate($image, 200, 200, 200);
imagefill($image, 0, 0, $bg_color);
# 点の色を黒に設定します。
$color = imagecolorallocate($image, 0, 0, 0);

# 点を描画します。
// 縦横10ピクセル間隔のグリッドの交差を左上にして4つのドットを四角に配置
for ($x = 10; $x < 400; $x += 10) {
  for ($y = 10; $y < 300; $y += 10) {
    imagesetpixel($image, $x, $y, $color);
    imagesetpixel($image, $x + 1, $y, $color);
    imagesetpixel($image, $x, $y + 1, $color);
    imagesetpixel($image, $x + 1, $y + 1, $color);
  }
}

# 画像を出力します。
imagepng($image);

# 画像を破棄しメモリを解放します。
imagedestroy($image);

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
