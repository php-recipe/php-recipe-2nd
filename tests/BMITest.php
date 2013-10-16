<?php
# テスト対象のクラス定義を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../lib/BMI.php';

class BMITest extends PHPUnit_Framework_TestCase
{
# judge()メソッドをテストするメソッドを定義します。
  /**
  * @dataProvider personProvider
  */
  public function testJudge($height, $weight, $judgement)
  {
    $bmi = new BMI($height, $weight);
    $test = $bmi->judge();
    $expected = $judgement;
    $this->assertEquals($expected, $test);
  }

# データプロバイダメソッドを定義します。
  public function personProvider()
  {
    return array(
      array(171, 55,  '普通体重'),
      array(161, 44,  '低体重'),
      array(192, 103, '肥満'),
    );
  }

# calcBMI()メソッドをテストするメソッドを定義します。
  public function testCalcBMI()
  {
# テスト対象クラスの名前である「BMI」、メソッド名である「calcBMI」
# を指定してReflectionMethodクラスのインスタンスを生成します。
    $ref = new ReflectionMethod('BMI', 'calcBMI');
# そのインスタンスのsetAccessible()メソッドに「true」を指定して、外部から当該
# メソッドへの呼び出しを可能にします。
    $ref->setAccessible(true);
# BMIクラスのインスタンスを生成し、invoke()メソッドの引数に指定して、
# calcBMI()メソッドの処理結果を$test変数に代入します。
    $test = $ref->invoke(new BMI(171, 55));

# $expected変数に、期待する結果を格納します。
    $expected = 18.81;
# $expected変数と$test変数の内容が一致することを確認します。
    $this->assertEquals($expected, $test);
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
