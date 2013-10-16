<?php
# Cookieに代入する文字列を設定します。
$cookie_data = 'PHP逆引きレシピ';
# CookieにCookie名「sample」で保存します。
$result = setcookie('sample', $cookie_data, time() + 3600, '/');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>データをCookieに保存したい(保存する)</title>
</head>
<body>
<div>
<?php
if ($result) {
  echo '<p>Cookieを保存しました。</p>';
} else {
  echo '<p>setcookie()関数の実行に問題が見つかりました。</p>';
}
?>
<p><a href="print_cookie.php">Cookieの中身を表示する</a></p>
</div>
</body>
</html>
