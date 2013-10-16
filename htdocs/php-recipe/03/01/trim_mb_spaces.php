<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>文字列の前後の空白を削除したい</title>
</head>
<body>
<div>
<?php
$text = '　 abc 　123　 　';  // 文字列の前後に全角スペースを含む
echo '<pre>削除前の文字列 [' . $text . ']</pre>';
echo '<ul>';

echo '<li><p>前後の空白を削除</p><pre>[';
echo mb_trim($text) . ']</pre></li>';

echo '<li><p>先頭の空白を削除</p><pre>[';
echo mb_ltrim($text) . ']</pre></li>';

echo '<li><p>末尾の空白を削除</p><pre>[';
echo mb_rtrim($text) . ']</pre></li>';

echo '</ul>';

# mb_trim()関数
# 文字列の前後の空白（全角スペース含む）を削除した文字列を返します。
function mb_trim($str)
{
  return mb_ereg_replace('\A(\s|　)+|(\s|　)+\z', '', $str);
}

# mb_ltrim()関数
# 文字列の先頭の空白（全角スペース含む）を削除した文字列を返します。
function mb_ltrim($str)
{
  return mb_ereg_replace('\A(\s|　)+', '', $str);
}

# mb_rtrim()関数
# 文字列の末尾の空白（全角スペース含む）を削除した文字列を返します。
function mb_rtrim($str)
{
  return mb_ereg_replace('(\s|　)+\z', '', $str);
}
?>
</div>
</body>
</html>
