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

class Subject extends Base
{
  public $lines = array();
  public $decoded_string = '';

  public function __construct($raw_string, $field_name, $field_value)
  {
    parent::__construct($raw_string, $field_name, $field_value);
    $this->decode();
  }

  protected function decode()
  {
    $prev_encoding = mb_internal_encoding();
    $temp = explode("\n", $this->field_value);

    foreach ($temp as $row) {
      $result = array(
        'encoding' => '(不明)',
        'decoded_string' => '',
        'encoded_string' => $row
      );

      if (preg_match('/^\s*=\?([^\?]*)\?/', $result['encoded_string'], $encode_matches)) {
        $result['encoding'] = $encode_matches[1];
        mb_internal_encoding($result['encoding']);

        $result['decoded_string'] = mb_convert_encoding(
          mb_decode_mimeheader($row),
          'UTF-8',
          $result['encoding']
        );
      } else {
        $result['decoded_string'] .= $row;
      }

      $this->lines[] = $result;
      $this->decoded_string .= $result['decoded_string'];
    }

    // 文字コードを戻す
    mb_internal_encoding($prev_encoding);

    $this->field_value = $this->decoded_string;

    return $this->field_value;
  }
}
