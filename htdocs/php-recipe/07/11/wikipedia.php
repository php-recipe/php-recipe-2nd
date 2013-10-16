<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$keyword = isset($_GET['q']) ? $_GET['q'] : '';

if ($keyword) {
# WikipediaのWeb APIで検索するためのURLを組み立てます。
  $qs = array(
    'action'   => 'query',
    'list'     => 'search',
    'format'   => 'json',
    'srsearch' => $keyword,
  );
  $url = 'https://ja.wikipedia.org/w/api.php?' . http_build_query($qs);

# WikipdiaのWeb APIから検索結果を取得します。
  $json = file_get_contents($url);
  if ($json === false) {
    die('システムエラーです。');
  }
# 取得したJSONデータをデコードします。
  $wikipedia = json_decode($json);
# デコード処理にエラーがないことを確認します。
  if (json_last_error() != JSON_ERROR_NONE) {
    die('システムエラーです。');
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>JSON形式のデータを利用する</title>
</head>
<body>
<form method="get" action="wikipedia.php">
Wikipedia検索: <input type="search" name="q" value="<?php echo h($keyword); ?>">
<input type="submit" value="検索">
</form>
<?php
if (isset($wikipedia)) {
  //var_dump($wikipedia);
  echo h($wikipedia->query->searchinfo->totalhits), '件<br>' . "\n";
  foreach ($wikipedia->query->search as $item) {
    //var_dump($item);
    $url   = 'https://ja.wikipedia.org/wiki/' . rawurlencode($item->title);
    $title = $item->title;
    $ts    = $item->timestamp;
    printf('%s <a href="%s">%s</a><br>' . "\n", h($ts), h($url), h($title));
  }
}
?>
</body>
</html>
