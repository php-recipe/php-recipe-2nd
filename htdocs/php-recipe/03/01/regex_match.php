<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>正規表現によるパターンマッチをしたい</title>
</head>
<body>
<div>
<?php
echo '<p>携帯電話番号にマッチするか</p>';
echo '<ul>';

# 携帯電話番号にマッチする正規表現です。\A(090|080|070)は文字列の先頭が090、080、
# 070のいずれかであることを示します。-?はハイフン1文字だけ、もしくはハイフンなし
# のどちらかにマッチします。\d{4}は4文字の数字にマッチします。\d{4}\zは文字列の
# 末尾が4文字の数字になっていることを示します。つまり、この正規表現は以下のよう
# な文字列がマッチします。
# 090-1234-5678、07011112222
$telPattern = '/\A(090|080|070)-?\d{4}-?\d{4}\z/';

$tel1 = '090-1234-5678';
echo '<li>' . $tel1;
if (preg_match($telPattern, $tel1)) {
  echo ' はマッチしています。</li>';
} else {
  echo ' はマッチしていません。</li>';
}

$tel2 = '07012345678';
echo '<li>' . $tel2;
if (preg_match($telPattern, $tel2)) {
  echo ' はマッチしています。</li>';
} else {
  echo ' はマッチしていません。</li>';
}

$tel3 = 'abc-defg-hijk';
echo '<li>' . $tel3;
if (preg_match($telPattern, $tel3)) {
  echo ' はマッチしています。</li>';
} else {
  echo ' はマッチしていません。</li>';
}

echo '</ul>';

echo '<p>郵便番号にマッチするか</p>';
echo '<ul>';

# 郵便番号にマッチする正規表現です。\A\d{3}は文字列の先頭が3文字の数字であること
# を示します。-?はハイフン1文字だけ、もしくはハイフンなしのどちらかにマッチしま
# す。\d{4}\zは文字列の末尾が4文字の数字になっていることを示します。つまり、この
# 正規表現は以下のような文字列がマッチします。
# 456-0001、4560002
$zipPattern = '/\A\d{3}-?\d{4}\z/';

$zip1 = '456-0001';
echo '<li>' . $zip1;
if (preg_match($zipPattern, $zip1)) {
  echo ' はマッチしています。</li>';
} else {
  echo ' はマッチしていません。</li>';
}

$zip2 = '4560002';
echo '<li>' . $zip2;
if (preg_match($zipPattern, $zip2)) {
  echo ' はマッチしています。</li>';
} else {
  echo ' はマッチしていません。</li>';
}

$zip3 = 'abc-defg';
echo '<li>' . $zip3;
if (preg_match($zipPattern, $zip3)) {
  echo ' はマッチしています。</li>';
} else {
  echo ' はマッチしていません。</li>';
}

echo '</ul>';
?>
</div>
</body>
</html>
