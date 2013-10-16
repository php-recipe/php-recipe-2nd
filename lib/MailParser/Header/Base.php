<?php
/**
 * このファイルは『PHP逆引きレシピ 第2版』のサンプルコードの一部です。
 *
 * @author    Yuta Sakurai
 * @license   BSD 3-Clause License
 * @copyright 2013 Kenji Suzuki, Kenichi Ando, Naoaki Yamada, Yoshiyuki Yamamoto, Yuta Sakurai, Hitoshi Asano
 * @link      http://php-recipe.com/
 */

namespace MailParser\Header;

class Base
{
  public $field_name = null;
  public $field_value = null;
  public $extend_values = array();

  public function __construct($raw_string, $field_name, $field_value)
  {
    $this->raw_string = $raw_string;
    $this->field_name = $field_name;
    $this->explodeFields($field_value);
  }

  protected function explodeFields($field_value)
  {
    $temp = explode(';', $field_value);
    for ($i = 0; $i < count($temp); $i++) {
      if ($i === 0) {
        $this->field_value = trim($temp[$i]);
      } else {
        $this->extend_values[] = trim($temp[$i]);
      }
    }

    foreach ($this->extend_values as $row) {
      if (preg_match('/^([^="]+)=(.+)/', $row, $matches)) {
        $this->{$matches[1]} = str_replace('"', '', $matches[2]);
      }
    }
  }
}
