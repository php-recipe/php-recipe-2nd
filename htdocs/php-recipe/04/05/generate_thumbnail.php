<?php
# 元ファイルのファイル名を設定します。
$fileName = '../../../../data/imagecopyresampled.png';
if (! file_exists($fileName)) {
  die('ファイルが存在しません。');
}

# 画像サイズを取得します
$imageSize = getimagesize($fileName);
$w = $imageSize[0];
$h = $imageSize[1];

# サムネイルの幅を100ピクセルとして、高さを算出します。
$newW = 100;
$newH = intval($newW / $w * $h);

# Content-Typeヘッダーを送信します。
header('Content-Type: image/png');
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');

# 再サンプリングを行ないます。
$imgThumb = imagecreatetruecolor($newW, $newH);
$image = imagecreatefrompng($fileName);
# 成功した場合、imagecopyresampled()関数はtrueを返します。
if (imagecopyresampled($imgThumb, $image, 0, 0, 0, 0, $newW, $newH, $w, $h)) {
# サムネイルをブラウザに出力します。
  imagepng($imgThumb);
}

# 画像を破棄しメモリを解放します。
imagedestroy($image);
imagedestroy($imgThumb);

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
