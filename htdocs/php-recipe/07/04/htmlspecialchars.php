<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>エスケープしてブラウザに表示する</title>
</head>
<body>
<div>
<?php
# h()関数を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$string = "<cite>'PHP'逆引きレシピ</cite>";
echo "そのまま表示： {$string}<br>\n";
echo 'htmlspecialchars()関数でエスケープ処理： ' . h($string) . "\n";
?>
</div>
</body>
</html>
