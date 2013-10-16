<?php
# Templateインターフェイスを宣言します。
interface Template
{
  const FORMAT = '{name} の値は {value} です。';

  public function setNumeric($name, $value);
  public function getTexts();
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
