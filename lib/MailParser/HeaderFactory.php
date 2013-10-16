<?php
/**
 * このファイルは『PHP逆引きレシピ 第2版』のサンプルコードの一部です。
 *
 * @author    Yuta Sakurai
 * @license   BSD 3-Clause License
 * @copyright 2013 Kenji Suzuki, Kenichi Ando, Naoaki Yamada, Yoshiyuki Yamamoto, Yuta Sakurai, Hitoshi Asano
 * @link      http://php-recipe.com/
 */

namespace MailParser;

use MailParser\Header\Base;

require_once __DIR__ . '/Header/Base.php';

class HeaderFactory
{
  protected static $known_fields = array(
    'Subject',
    'From',
    'ContentType',
  );

  public static function parseHeader($header_string)
  {
    $temp = explode(':', $header_string);
    $field_name = trim($temp[0]);
    $class_name = str_replace('-', '', $field_name);

    if (in_array($class_name, static::$known_fields)) {
      require_once __DIR__ . "/Header/{$class_name}.php";
      $class_name = 'MailParser\\Header\\' . $class_name;
      $object = new $class_name($header_string, $field_name, $temp[1]);
    } else {
      $object = new Base($header_string, $field_name, $temp[1]);
    }

    return $object;
  }

  public static function parseHeaders(array $header_strings)
  {
    foreach ($header_strings as $header_string) {
      $object = static::parseHeader($header_string);
      $return[$object->field_name] = $object;
    }

    return $return;
  }
}
