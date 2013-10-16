<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# セッションCookieのパラメータを設定します。
session_set_cookie_params(0, '/', 'www.example.jp');
# セッションを開始します。
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>セッションCookieのパラメータを設定したい</title>
</head>
<body>
<div>
<?php
echo '<p>現在のセッションCookieの設定内容</p>';
echo '<pre>';
print_r(h(session_get_cookie_params()));
echo '</pre>';
?>
</div>
</body>
</html>
