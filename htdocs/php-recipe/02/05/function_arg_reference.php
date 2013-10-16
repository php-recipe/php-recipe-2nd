<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>関数の引数に付いた＆って何ですか？</title>
</head>
<body>
<div>
<?php
# 引数が参照渡しの関数を定義します。
function breakfast(&$drink)
{
  $drink = 'アイスコーヒー';
}

# 変数に文字列を代入し、そのまま表示します。
$string = 'ホットコーヒー';
echo '関数実行前の$string: ' . $string . '<br>';

# 変数を引数にして関数を実行します。
breakfast($string);
# 関数実行後の変数を表示します。
echo '関数実行後の$string: ' . $string;
?>
</div>
</body>
</html>
