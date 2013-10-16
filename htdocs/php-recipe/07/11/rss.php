<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>RSSを解析する</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# XXE攻撃対策のため、外部エンティティの読み込み機能を無効にします。
libxml_disable_entity_loader(true);

# RSSをfile_get_contents()関数☆レシピ113☆（ファイルのデータをまとめて取得したい）で取得します。
$xml = file_get_contents('http://jvn.jp/rss/jvn.rdf');
# 取得したRSSをsimplexml_load_string()関数で処理します。
$rdf = simplexml_load_string($xml);
//var_dump($rdf);
if ($rdf === false) {
  die('システムエラーです。');
}

$ns_dc  = 'http://purl.org/dc/elements/1.1/';
$ns_rdf = 'http://www.w3.org/1999/02/22-rdf-syntax-ns#';

foreach ($rdf->item as $item) {
  //var_dump($item);
  $date  = $item->children($ns_dc)->date;
  $about = $item->attributes($ns_rdf)->about;
  $title = $item->title;
  printf('%s <a href="%s">%s</a><br>' . "\n", h($date), h($about), h($title));
}
?>
</div>
</body>
</html>
