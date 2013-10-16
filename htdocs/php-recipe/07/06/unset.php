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
<title>セッション変数を破棄したい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
$_SESSION['user'] = 'user';
$_SESSION['name'] = 'name';

echo '<table>';
echo '<tr><td>元のセッション変数</td><td><pre>';
print_r(h($_SESSION));
echo '</pre></td></tr>';

echo '<tr><td>nameに配列をセット</td><td><pre>';
$_SESSION['name'] = array('PHP逆引きレシピ', 'CodeIgniter徹底入門');
print_r(h($_SESSION));
echo '</pre></td></tr>';

echo "<tr><td>userに「''」空をセット</td><td><pre>";
$_SESSION['user'] = '';
print_r(h($_SESSION));
echo '</pre></td></tr>';

echo '<tr><td>nameを破棄</td><td><pre>';
unset($_SESSION['name']);
print_r(h($_SESSION));
echo '</pre></td></tr>';
echo '</table>';
?>
</div>
</body>
</html>
