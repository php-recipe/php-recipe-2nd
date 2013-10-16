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

class ContentType extends Base
{
  public $is_text;
  public $is_multi;

  public function __construct($raw_string, $field_name, $field_value)
  {
    parent::__construct($raw_string, $field_name, $field_value);

    $this->isText();
    $this->isMulti();
  }

  public function isText()
  {
    if (preg_match('%^text/%', $this->field_value)) {
      $this->is_text = true;
    } else {
      $this->is_text = false;
    }

    return $this->is_text;
  }

  public function isMulti()
  {
    if (preg_match('%^multipart/%', $this->field_value)) {
      $this->is_multi = true;
    } else {
      $this->is_multi = false;
    }

    return $this->is_multi;
  }
}
