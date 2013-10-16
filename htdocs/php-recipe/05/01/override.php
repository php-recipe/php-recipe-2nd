<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>オーバーライド</title>
</head>
<body>
<div>
<?php
# 親クラスとなるSuperClassを定義します。
class SuperClass
{
  public $a = '親クラスのプロパティA';
  public $b = '親クラスのプロパティB';

  public function show()
  {
    return '親クラスのメソッド: ' . $this->a . ' と ' . $this->b;
  }
}

# SuperClassを継承し、SubClassを定義します。これはSuperClassの子クラスです。
class SubClass extends SuperClass
{
  public $a = '子クラスのプロパティA';

  public function show()
  {
    return '子クラスのメソッド: ' . $this->a . ' と ' . $this->b;
  }
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

$obj = new SubClass();
echo h($obj->show());
?>
</div>
</body>
</html>
