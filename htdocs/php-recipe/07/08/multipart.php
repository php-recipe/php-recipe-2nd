<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>添付ファイル付きのメールを送りたい</title>
</head>
<body>
<div>
<?php
$mailTo      = 'receiver@example.jp';                   // 宛て先アドレス
$mailFrom    = 'sender@example.jp';                     // 差出人のメールアドレス
$mailSubject = '添付ファイル付きメール';                // メールのタイトル
$mailMessage = '添付ファイル付きメールのテストです。';  // メール本文
$fileName    = 'multipart.jpg';                         // 添付するファイル
$returnMail  = $mailFrom;                               // Return-Pathに指定する
                                                        // メールアドレス

# メールで日本語使用するための設定をします。
mb_language("Ja") ;
mb_internal_encoding("UTF-8");

$header  = "From: $mailFrom\n";
$header .= "MIME-Version: 1.0\n";
$header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"";

$body  = "--__PHPRECIPE__\r\n";
$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";
$body .= "\r\n";
$body .= $mailMessage . "\r\n";
$body .= "--__PHPRECIPE__\r\n";

# 添付ファイルの処理をします。
$handle = fopen($fileName, 'r');
$attachFile = fread($handle, filesize($fileName));
fclose($handle);
$attachEncode = base64_encode($attachFile);

$body .= "Content-Type: image/jpeg; name=\"$fileName\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n";
$body .= "\r\n";
$body .= chunk_split($attachEncode) . "\r\n";
$body .= "--__PHPRECIPE__--\r\n";

# メールの送信と結果の判定をします。セーフモードがOnの場合は第5引数が使えません。
if (ini_get('safe_mode')) {
  $result = mb_send_mail($mailTo, $mailSubject, $body, $header);
} else {
  $result = mb_send_mail($mailTo, $mailSubject, $body, $header,
                         '-f' . $returnMail);
}
if ($result) {
  echo '<p>添付メールを送信しました。</p>';
} else {
  echo '<p>送信に失敗しました。</p>';
}
?>
</div>
</body>
</html>
