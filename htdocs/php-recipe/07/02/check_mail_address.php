<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>メールアドレスの形式をチェックしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $pattern = '/\A([a-z0-9_\-\+\/\?]+)(\.[a-z0-9_\-\+\/\?]+)*' .
             '@([a-z0-9\-]+\.)+[a-z]{2,6}\z/i';
  if (preg_match($pattern, $email)) {
    echo '<p>「' . h($email) . '」はメールアドレスとして正しい形式です。</p>';
  } else {
    echo '<p>「' . h($email) .
         '」はメールアドレスとして正しい形式ではありません。</p>';
  }
}
?>
<form method="post" action="check_mail_address.php">
<p>メールアドレスを入力してください</p>
<input type="email" name="email" value="">
<input type="submit" value="確認する">
</form>
</div>
</body>
</html>
