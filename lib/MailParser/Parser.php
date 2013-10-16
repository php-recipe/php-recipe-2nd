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

require_once __DIR__ . '/HeaderFactory.php';
require_once __DIR__ . '/Body/Base.php';

class Parser
{
  public static function parse($raw_mail_data)
  {
    $root = static::createBody($raw_mail_data);
    $contents[] = $root;

    if ($root->isMulti()) {
      $contents = array_merge(
        $contents,
        static::parseAttachments(
          $root->headers['Content-Type']->boundary,
          $root->raw_string
        )
      );
    }

    return $contents;
  }

  public static function parseAttachments($boundary, $raw_body)
  {
    $attachments = static::splitByBoundary($boundary, $raw_body);
    foreach ($attachments as $row) {
      $content = static::createBody($row);
      $contents[] = $content;
    }

    return $contents;
  }

  public static function createBody($raw_string)
  {
    preg_match('/^(.*?)\r?\n\r?\n(.*)/us', $raw_string, $matches);
    $raw_header = (isset($matches[1])) ? $matches[1] : "";
    $raw_body = (isset($matches[2])) ? $matches[2] : "";

    // ヘッダー部分を1行ずつの配列に
    $headers = preg_split(
      '/\r?\n/us',
      $raw_header
    );

    // ヘッダー配列を１つずつチェック
    foreach ($headers as $i => $header) {
      // 先頭が空白で始まっている場合、直前のヘッダーの続きとみなして、直前のヘッダーと連結
      if (($temp = preg_replace('/^\s+/', "\n", $header)) !== $header) {
        $headers[$prev_header_index] .= $temp;
        unset($headers[$i]);
      } else {
        $prev_header_index = $i;
      }
    }

    $headers = HeaderFactory::parseHeaders($headers);
    $body = new Body\Base($raw_body, $headers);

    return $body;
  }

  public static function splitByBoundary($boundary, $raw_mail_data)
  {
    $contents = preg_split('/^--' . $boundary . '-*(\r?\n)*/um', $raw_mail_data);
    foreach ($contents as $key => $row) {
      if (! $row) {
        unset($contents[$key]);
      }
    }
    return $contents;
  }
}
