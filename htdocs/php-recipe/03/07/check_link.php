<?php
# コマンドライン以外からの実行を禁止します。
if (PHP_SAPI != 'cli') {
  exit();
}

# 引数が1つでない場合、または、第1引数が「--help」「-h」の場合は、ヘルプ
# メッセージを表示し、終了します。
if ($argc != 2 || in_array($argv[1], array('--help', '-h'))) {
  echo "使用法: $argv[0] <ファイル名>", PHP_EOL;
  exit();
}

# 第1引数を$filenameに代入します。
$filename = $argv[1];
# 第1引数で与えられたファイルの中身を取得して変数に代入します。
$content = file_get_contents($filename);

# <a href="～">を抜き出すための正規表現☆レシピ048☆（正規表現によるパターンマッチをしたい）を定義します。
$regex = '/<a href="(.+?)">/ui';
# <a href="～">を抜き出し、$matchesに保存します。
preg_match_all($regex, $content, $matches, PREG_SET_ORDER);

foreach ($matches as $match) {
# href属性の値を$urlに代入します。
  $url = $match[1];
# http:またはhttps:で始まらない場合は処理をスキップします。
  if (! preg_match('/\Ahttp(s?):/', $url)) {
    continue;
  }

# URLを取得します。
  $check = @file_get_contents($url);
# URLを取得できなかった場合は、falseが返るのでそれでリンク切れを判定します。
  if ($check === false) {
    echo 'NG: ', $url, PHP_EOL;
  } else {
    echo 'OK: ', $url, PHP_EOL;
  }
}
