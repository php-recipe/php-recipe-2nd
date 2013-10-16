<?php
# Counterクラスを定義します。
class Counter
{
# 静的プロパティ$countを宣言します。
  public static $count = 0;

# 静的メソッドincrement()を宣言します。
  public static function increment()
  {
    static::$count++;
  }
  
# 静的メソッドcurrent()を宣言します。
  public static function current()
  {
    return static::$count;
  }
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
