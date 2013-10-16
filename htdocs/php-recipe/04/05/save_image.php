<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>画像をファイルとして保存したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# ファイル名を設定します。
$fileName = '../../../../data/output/imagepng.png';
if (! is_dir(dirname($fileName))) {
  die('保存するディレクトリが存在しません。');
}

# 画像を作成します。
$image = imagecreatetruecolor(400, 300);

# 画像の背景色を設定します。
$bg_color = imagecolorallocate($image, 0, 255, 0);
imagefill($image, 0, 0, $bg_color);

# 画像をファイルに保存します。
# 成功した場合、imagepng()関数はtrueを返します。
if (imagepng($image, $fileName)) {
# ☆レシピ131☆（ディレクトリ内の画像を一覧表示したい）の「display.php」を使って画像を表示させます。
  $url = '../02/display.php?file=' . rawurlencode(basename($fileName))
       . '&dir=output';
  echo '<a href="' . h($url) . '">保存した画像ファイルを表示する</a>';
}

# 画像を破棄しメモリを解放します。
imagedestroy($image);
?>
</div>
</body>
</html>
