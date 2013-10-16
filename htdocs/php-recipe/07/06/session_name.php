<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# セッション名をSHOEISHAに設定します。戻り値は変更前のセッション名です。
$oldSessionName = session_name('SHOEISHA');
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>セッション名を取得／設定したい</title>
</head>
<body>
<div>
<?php
echo '<p>標準のセッション名は、' . h($oldSessionName) . 'です。</p>';
echo '<p>独自のセッション名は、' . h(session_name()) . 'です。</p>';
?>
</div>
</body>
</html>
