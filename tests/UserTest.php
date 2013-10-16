<?php
# テスト対象のクラス定義を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../lib/User.php';

class UserTest extends PHPUnit_Framework_TestCase
{
# コンストラクタをテストするメソッドを定義します。
  public function testConstruct()
  {
    $user = new User('佐藤');
# '佐藤'という文字列と、$user->nameプロパティの内容が一致することを確認します。
    $this->assertEquals('佐藤', $user->name);
  }

# createMessage()メソッドをテストするメソッドを定義します。
  public function testCreateMessage()
  {
    $user = new User('河合');
# $test変数に、createMessage()メソッドの戻り値を格納します。
    $test = $user->createMessage();
# $expected変数に、期待する文字列を格納します。
    $expected = 'こんにちは、河合さん';
# $expected変数と$test変数の内容が一致することを確認します。
    $this->assertEquals($expected, $test);
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
