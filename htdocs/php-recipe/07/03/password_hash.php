<?php
# PHP5.5より前の環境（5.3.7以降）でもpassword_hash()関数を使えるようにします。
require_once '../../../../lib/password_compat/password.php';
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_POST['submit'])) {
  $password = $_POST['password'];

# ハッシュ処理の計算コストを指定します。ソルトは自動生成とします。
  $options = array('cost' => 10);
# ハッシュ化方式にPASSWORD_DEFAULTを指定し、パスワードをハッシュ化します。
  $hash = password_hash($password, PASSWORD_DEFAULT, $options);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>ハッシュ化済みパスワードを取得するスクリプト</title>
</head>
<body>
<div>
<?php
if (isset($hash)) {
  echo '生パスワード： ' . h($password) . '<br>';
  echo 'ハッシュ化済みパスワード： ' . h($hash);
}
?>
  <hr>
  <form action="password_hash.php" method="post">
    <label for="password">ハッシュ化したいパスワード文字列：</label>
    <input type="text" name="password" id="password" value="">
    <input type="submit" name="submit" value="ハッシュ化">
  </form>
</div>
</body>
</html>
