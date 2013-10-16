<?php
# generateRandomString()関数
# 第1引数には、生成する文字列の文字数を指定します。第2引数には、生成時に使用する
# 文字を指定します。半角英数字（記号を含む）のみを指定することが可能です。この
# 引数を省略した場合は小文字アルファベットを使用して文字列を生成します。
function generateRandomString($length, $elem = false)
{
# 文字数が0以下に指定されている場合は空文字を返します。
  if ($length <= 0) {
    return '';
  }

# 使用文字が省略されている場合、小文字アルファベットを使用してランダムな文字列を
# 生成します。
  if ($elem === false) {
    $elem = 'abcdefghijklmnopqrstuvwxyz';
  }

# 使用文字が1文字以上の記号を含む半角英数字（スペース文字や制御文字は除く）で
# 構成されているか正規表現でチェックします。正規表現の[\x21-\x7e]はASCII文字
# コード表の0x21（!）から0x7e（~）までの文字を表わしています。
  if (! preg_match('/\A[\x21-\x7e]+\z/', $elem)) {
    die('ランダム生成のための文字列に不正な文字が含まれています。');
  }

# 使用可能文字を1文字ずつ配列に格納します。
  $chars = preg_split('//', $elem, -1, PREG_SPLIT_NO_EMPTY);

# 「使用可能文字の配列」から重複文字を取り除きます。
  $chars = array_unique($chars);

# 乱数のシード値☆レシピ065☆（乱数を生成したい）を設定します。
  mt_srand((double) microtime() * 10000000);

# 「使用可能文字の配列」の添え字を乱数で指定して、ランダムな文字を1文字ずつ生成
# していきます。それを指定文字数になるまで繰り返します。
  $str = '';
  $maxIndex = count($chars) - 1;
  for ($i = 0; $i < $length; $i++) {
    $str .= $chars[mt_rand(0, $maxIndex)];
  }

  return $str;
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
