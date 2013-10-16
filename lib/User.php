<?php
# テスト対象のクラス☆レシピ153☆（クラスとは？）を定義します。
class User
{
  public $name;

# コンストラクタ☆レシピ156☆（コンストラクタとは？）を定義します。
  public function __construct($name)
  {
    $this->name = $name;
  }

# 自分の名前をメッセージ付きで返すメソッドです。
  public function createMessage()
  {
# 自分の名前をメッセージ付きで返します（このままでは正しく動きません）。
    return "こんにちは、{$name}さん！";
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
