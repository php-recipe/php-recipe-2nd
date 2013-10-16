<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>可変長引数の関数を定義する</title>
</head>
<body>
<div>
<?php

# 可変長引数の関数です。
function config()
{
# 引数の数を代入します。
  $num  = func_num_args();
# 引数を配列として代入します。
  $args = func_get_args();

  $config = array();

# 引数の数だけforeach構文でループします。
  foreach ($args as $arg) {
# ここではサンプルのため、受けた引数をもとに連想配列に代入するだけですが、
# 実際は、データベースに設定を保存するなどが考えられます。
    $config[$arg[0]] = $arg[1];
  }

  echo '引数の数: ' . $num . '<br>';
  echo '内容';
  var_dump($config);
}

# 設定項目名と設定値を定義します。
$config1 = array('設定1', 100);
$config2 = array('設定2', 200);
$config3 = array('設定3', 'ABC');

# 引数に設定値を渡し関数を呼び出します。引数の数はいくらでも増やせます。
config($config1, $config2, $config3);
?>
</div>
</body>
</html>
