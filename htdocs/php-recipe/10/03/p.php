<?php
// HTMLでの専用出力クラス
class p
{
  public static $encoding = 'UTF-8';

  public static function h($str)  // HTMLエスケープして出力
  {
    echo htmlspecialchars($str, ENT_QUOTES, static::$encoding);
  }
    
  public static function url_attr($str) // URLとしての属性値のみを出力
  {
# ここでは、「http:」「https:」「/」で始まる文字列のみを出力します。
    if (preg_match('/\Ahttp(s?):/', $str) || preg_match('#\A/#', $str)) {
      p::h($str);
    } else {
# 「http:」「https:」「/」で始まらない文字列はログに記録します。
      static::log(__METHOD__, $str);
    }
  }
  
  public static function num($str)  // 半角数字のみを出力
  {
    if (preg_match('/\A[0-9]+\z/u', $str)) {
      echo $str;
    } else {
      static::log(__METHOD__, $str);
    }
  }
  
  public static function alnum($str)  // 半角英数のみを出力
  {
    if (preg_match('/\A[0-9a-z]+\z/ui', $str)) {
      echo $str;
    } else {
      static::log(__METHOD__, $str);
    }
  }
  
  // 英数字とマイナス、ピリオド以外をUnicodeエスケープして出力
  public static function js($str)
  {
    echo preg_replace_callback(
      '/[^-\.0-9a-zA-Z]+/u', 
      'static::unicode_escape', 
      $str
    );
  }
  
  public static function raw($str)  // そのまま出力（危険）
  {
    echo $str;
  }

  // エラーをログに出力する
  protected static function log($method, $str)
  {
# バックトレースを配列で取得します。
    $backtrace = debug_backtrace();
# 2つ前の情報からファイル名と行数を取得します。
    $file = $backtrace[1]['file'];
    $line = $backtrace[1]['line'];
    error_log(
      $method . ': Invalid string: "' . $str . 
      '" in ' . $file . ' line ' . $line
    );
  }

  // 文字列をすべて \uXXXX 形式に変換
  protected static function unicode_escape($matches)
  {
    $u16 = mb_convert_encoding($matches[0], 'UTF-16');
    return preg_replace('/[0-9a-f]{4}/', '\u$0', bin2hex($u16));
  }
}
