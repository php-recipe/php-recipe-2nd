<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>デフォルト引数値を指定したい</title>
</head>
<body>
<div>
<?php
# 関数のデフォルト引数値を指定します。
function recommend($musician = 'The Beatles')
{
  return 'おすすめの音楽は' . $musician . '<br>';
}

# 関数を実行して結果を表示します。
echo recommend();
echo recommend('The Rolling Stones');
?>
</div>
</body>
</html>
