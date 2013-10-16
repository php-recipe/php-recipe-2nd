<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>self、parent、static</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# 定数CONST_VALUEのみを持ったFirstクラスを定義します。
class First
{
  const CONST_VALUE = 'first';
}

# Firstクラスを継承し、show()メソッドを追加したSecondクラスを定義します。
class Second extends First
{
  const CONST_VALUE = 'second';

# parent、self、staticそれぞれの定数CONST_VALUEを表示します。
  public function show()
  {
    echo h(parent::CONST_VALUE) . ', ';
    echo h(self::CONST_VALUE) . ', ';
    echo h(static::CONST_VALUE) . '<br>';
  }
}

# Secondクラスを継承したThirdクラスを定義します。
class Third extends Second
{
  const CONST_VALUE = 'third';

# 親クラスのshow()メソッドを呼び出します。
  public function show()
  {
    parent::show();
  }
}

echo '<p>';
echo 'Secondクラスのshow()メソッドを呼び出す：' . '<br>';
$second = new Second();
$second->show();
echo '</p>';

echo '<p>';
echo 'Thirdクラスのshow()メソッドを呼び出す：' . '<br>';
$third = new Third();
$third->show();
echo '</p>';
?>
</div>
</body>
</html>
