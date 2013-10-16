<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

if (! empty($_POST['submit'])) {
  $to      = 'admin@example.org';
  $subject = $_POST['subject'];
  $body    = $_POST['body'];
  $from    = 'From: ' . $_POST['from'];

  if (mb_send_mail($to, $subject, $body, $from)) {
    echo 'メールを送信しました';
  } else {
    echo 'メール送信失敗です';
  }

  exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>メール送信フォーム</title>
</head>
<body>
<div>
<form method="post" action="mail_header_injection.php">
メールアドレス: <input type="email" name="from" size="20"><br>
件名: <input type="text" name="subject" size="20"><br>
本文: <textarea rows="5" name="body" cols="40"></textarea>
<input type="submit" name="submit" value="送信">
</form>
</div>
</body>
</html>
