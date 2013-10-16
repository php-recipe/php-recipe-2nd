<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>「$this」と「-&gt;」</title>
</head>
<body>
<div>
<?php
# Testクラスを定義します。
class Test {
# プロパティを初期化します。
  public $var1 = 1;
  public $var2 = 2;

  function show()
  {
# show()メソッド内のローカル変数$var1です。
    $var1 = 'var2';

    echo '$this-&gt;var1: ' . h($this->var1) . '<br>';
    echo '$var1: ' . h($var1) . ' <br>';
    echo '$this-&gt;$var1: ' . h($this->$var1) . ' <br>';
  }
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

# Testクラスをインスタンス化します。
$obj = new Test();

# Testオブジェクトのshow()メソッドを呼び出します。
$obj->show();

# Testオブジェクトのプロパティvar1を外部から変更します。
$obj->var1 = 99;

# Testオブジェクトのプロパティvar1を外部から取得します。
echo h($obj->var1) . '<br>';

# Testオブジェクトのshow()メソッドを呼び出します。
$obj->show();
?>
</div>
</body>
</html>
