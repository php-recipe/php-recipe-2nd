<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>定数を使用するには？</title>
</head>
<body>
<div>
<?php
# 定数を定義します。
define('HELLO', 'Hello world!');
echo '定数: HELLO: ' . HELLO . '<br>';
# 定数Helloは定義されていないためNoticeエラーが発生します。
echo '定数: Hello: ' . Hello . '<br>';

# 定数定義の戻り値を$resultに代入します。第3引数にtrueを指定して大文字・小文字を
# 区別しないようにします。
$result = define('GREETING', 'こんにちは', true);
if ($result) {
  echo '定数: GREETING: ' . GREETING . '<br>';
  echo '定数: Greeting: ' . Greeting . '<br>';
} else {
  echo '定数の定義に失敗しました。' . '<br>';
}

# PHP5.3以降では、constキーワードを使うことでも定義できます。
const WORLD = 'World';
echo '定数: WORLD: ' . WORLD;
?>
</div>
</body>
</html>
