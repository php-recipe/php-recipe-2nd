<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>現在のセッションIDを取得する</title>
</head>
<body>
<div>
<?php
echo '<p>現在のセッションIDは「' . h(session_id()) . '」です。</p>';
?>
</div>
</body>
</html>
