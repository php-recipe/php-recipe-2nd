<?php
# jQueryなど主要なJavaScriptライブラリを通じてのアクセスである
# （ブラウザからの直接アクセスでない）ことを確認します。
# この方法はJSONハイジャック攻撃など☆レシピ305☆（JSONのセキュリティについて知りたい）に対しても有効です。
if (! isset($_SERVER['HTTP_X_REQUESTED_WITH']) ||
    $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
  die(json_encode(array('status' => "不正な呼び出しです")));
}

# データを準備します。
$value = array(
  1 => array('item' => '台湾ラーメン', 'price' => 580, 'orders' => 113),
  2 => array('item' => '台湾ラーメン(アメリカン)', 'price' => 580, 'orders' => 72),
  3 => array('item' => 'ニンニクチャーハン', 'price' => 630, 'orders' => 87),
);

# Content-Typeを「application/json」に設定します。
header("Content-Type: application/json; charset=UTF-8");
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header("X-Content-Type-Options: nosniff");

# 可能な限りのエスケープを行ない、JSON形式で結果を返します。
echo json_encode(
  $value,
  JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP
);
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
