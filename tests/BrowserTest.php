<?php

class BrowserTest extends PHPUnit_Extensions_Selenium2TestCase
{
  public function setUp()
  {
# Selenium Serverへの接続情報をセットします。
    $this->setHost('localhost');
    $this->setPort(4444);
# テストに使うブラウザを指定します。
    $this->setBrowser('firefox');
# テスト対象のURLを指定します。
    $this->setBrowserUrl('http://localhost/php-recipe/');
  }

  public function testTitle()
  {
# URLを指定してページを開きます。
    $this->url('07/02/form_mb_strlen.php');
# title()メソッドでページのタイトルを取得し、内容を確認します。
    $this->assertEquals('文字数や桁数をチェックしたい', $this->title());
  }

  public function testTopPageText()
  {
    $this->url('07/02/form_mb_strlen.php');
# CSSセレクタを使って、Webページのp要素を取得します。
    $element = $this->byCssSelector('body > div > form > p');
# 取得したHTML要素のテキストをtext()メソッドで取得し、内容を確認します。
    $this->assertEquals('文字か数字を入力してください', $element->text());
  }

  public function testForm()
  {
    $this->url('07/02/form_mb_strlen.php');
# CSSセレクタを使って、入力フォームのテキストボックス要素を取得します。
    $textbox = $this->byCssSelector('input[type="text"]');
# value()メソッドを使い、入力値をセットします。
    $textbox->value('PHP逆引きレシピ');
# CSSセレクタを使って、入力フォームの送信ボタン要素を取得します。
    $submit = $this->byCssSelector('input[type="submit"]');
# click()メソッドを使い、クリックイベントを発生させます。
    $submit->click();

# CSSセレクタを使って、フォーム送信後の結果を取得し、内容を確認します。
    $element = $this->byCssSelector('body > div > p');
    $this->assertEquals('「PHP逆引きレシピ」は9文字です。', $element->text());
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
