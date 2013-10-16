<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>クラスの継承</title>
</head>
<body>
<div>
<?php
// 親クラス
class SuperClass
{
  public function getSuperData()
  {
    return '親クラス';
  }
}

// 子クラス
class SubClass extends SuperClass
{
  public function getSubData()
  {
    return '子クラス';
  }
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

# SubClassクラスのオブジェクトを作成します。
$obj = new SubClass();
# SubClassのgetSuperData()メソッドを実行し、値をecho文で表示します。
echo h($obj->getSuperData()) . '<br>';
# SubClassのgetSubData()メソッドを実行し、値をecho文で表示します。
echo h($obj->getSubData()) . '<br>';
?>
</div>
</body>
</html>
