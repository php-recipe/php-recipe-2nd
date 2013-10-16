<?php
class TemplateMethodsTest extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    echo __METHOD__ . PHP_EOL;
  }

# テストメソッドです。
  public function testOne()
  {
    echo __METHOD__ . PHP_EOL;
# assertTrue()メソッドは引数がtrueかどうかをテストします。
    $this->assertTrue(true);
  }

# テストメソッドです。
  public function testTwo()
  {
    echo __METHOD__ . PHP_EOL;
# assertFalse()メソッドは引数がfalseかどうかをテストします。
    $this->assertFalse(false);
  }

  protected function tearDown()
  {
    echo __METHOD__ . PHP_EOL;
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
