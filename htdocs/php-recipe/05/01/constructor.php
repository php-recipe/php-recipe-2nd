<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>コンストラクタ</title>
</head>
<body>
<div>
<?php
# コンストラクタを持ったクラスを定義します。
class MyClass
{
  public function __construct($arg)
  {
    echo 'コンストラクタ: ' . h($arg);
  }
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

$obj = new MyClass('テスト');
?>
</div>
</body>
</html>
