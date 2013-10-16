<?php
# 既存の画像ファイルを設定します。
$fileName = '../../../../data/imagecreatefrompng.png';
if (! file_exists($fileName)) {
  die('ファイルが存在しません。');
}

# 既存ファイルから画像を作成します。
$image = imagecreatefrompng($fileName);

# 書き込む要素を設定します。
// 文字サイズ
$size = 24;
// 角度数（左から右へ水平が0、プラス：座標を軸に反時計回り方向）
$angle = 0;
// 座標（左上隅が0,0）
$x = 50;
$y = 50;
// 文字色の設定
$textColor = imagecolorallocate($image, 128, 0, 0);
// フォントファイル（適切にパスを設定のこと）
$font = '../../../../lib/fonts/ipag00303/ipag.ttf';
if (! file_exists($font)) {
  die('フォントファイルが存在しません。');
}

# 文字列を書き込みます。
$string = 'オアシス21'; // 書き込む文字列
imagettftext($image, $size, $angle, $x, $y, $textColor, $font, $string);

# Content-Typeヘッダーを送信します。
header('Content-Type: image/png');
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');

# 画像を出力します。
imagepng($image);

# 画像を破棄しメモリを解放します。
imagedestroy($image);

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
