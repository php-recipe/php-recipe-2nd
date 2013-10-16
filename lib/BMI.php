<?php
# テスト対象のクラスを定義します。
class BMI
{
  private $height;  // 身長cm
  private $weight;  // 体重kg

  public function __construct($height, $weight)
  {
    $this->height = $height;
    $this->weight = $weight;
  }

  private function calcBMI()
  { // BMI = 体重(kg) ÷ 身長(m)の2乗
    return round($this->weight / pow($this->height / 100, 2), 2);
  }

  public function judge()
  {
    $bmi = $this->calcBMI();

    if ($bmi < 18.5) {      // BMIが18.5未満
      $judge = '低体重';
    } elseif ($bmi < 25) {  // BMIが18.5以上25未満
      $judge = '普通体重';
    } else {                // BMIが25以上
      $judge = '肥満';
    }

    return $judge;
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
