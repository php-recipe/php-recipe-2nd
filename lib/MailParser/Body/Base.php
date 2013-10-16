<?php
/**
 * このファイルは『PHP逆引きレシピ 第2版』のサンプルコードの一部です。
 *
 * @author    Yuta Sakurai
 * @license   BSD 3-Clause License
 * @copyright 2013 Kenji Suzuki, Kenichi Ando, Naoaki Yamada, Yoshiyuki Yamamoto, Yuta Sakurai, Hitoshi Asano
 * @link      http://php-recipe.com/
 */

namespace MailParser\Body;

class Base
{
  public $raw_string = '';
  public $headers = array();

  public function __construct($raw_string, $headers)
  {
    $this->raw_string = $raw_string;
    $this->headers = $headers;
  }

  public function getDecodedData()
  {
    if ($this->isText()) {
      $return = mb_convert_encoding(
        $this->raw_string,
        'UTF-8',
        $this->headers['Content-Type']->charset
      );
    } else {
      $return = $this->raw_string;
    }

    return $return;
  }

  public function isText()
  {
    if (array_key_exists('Content-Type', $this->headers)) {
      return $this->headers['Content-Type']->isText();
    }

    return false;
  }

  public function isMulti()
  {
    if (array_key_exists('Content-Type', $this->headers)) {
      return $this->headers['Content-Type']->isMulti();
    }

    return false;
  }

  public function getHeaderStrings()
  {
    $return = '';
    foreach ($this->headers as $header) {
      $return .= "\n{$header->field_name}: {$header->field_value}";
      if (count($header->extend_values)) {
        $return .= '; ' . implode('; ', $header->extend_values);
      }
    }

    return $return;
  }
}
