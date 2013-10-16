<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>抽象クラス</title>
</head>
<body>
<div>
<?php
# 図形クラスを抽象クラスとして定義します。
abstract class Figure
{
# 図形の面積を取得する抽象メソッドを宣言します。
  public abstract function getSize();
}

# 図形クラスを継承して、円クラスを定義します。
class Circle extends Figure
{
  private $radius;  // 円の半径

  public function __construct($radius)
  {
    $this->radius = $radius;
  }

  public function getSize()
  {
    // 円の面積 ＝ 半径 × 半径 × 円周率
    $size = $this->radius * $this->radius * pi();
    // round()関数を使用して数値を丸めて返す
    return round($size, 3);
  }
}

# 図形クラスを継承して、三角形クラスを定義します。
class Triangle extends Figure
{
  private $base;    // 三角形の底辺
  private $height;  // 三角形の高さ

  public function __construct($base, $height)
  {
    $this->base   = $base;
    $this->height = $height;
  }

  public function getSize()
  {
    // 三角形の面積 ＝ 底辺 × 高さ ÷ 2
    $size = $this->base * $this->height / 2;
    // round()関数を使用して数値を丸めて返す
    return round($size, 3);
  }
}

# 図形を保持する配列を作成します。
$figures = array();
# Circleクラスのオブジェクトを作成し、配列に追加します。
$figures[] = new Circle(5);
# Triangleクラスのオブジェクトを作成し、配列に追加します。
$figures[] = new Triangle(10, 5);

foreach ($figures as $figure) {
# 配列に保持された図形のクラス名と面積を表示します。
  echo get_class($figure) . ' : ' . h($figure->getSize()) . '<br>';
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
