<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>複数の検索キーワードで検索したい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';
# checkInput()関数☆レシピ214☆（メール送信フォームを作成したい）を読み込みます。
require_once '../../../../lib/checkInput.php';

# POSTされたデータをチェックします。
$_POST = checkInput($_POST);

# 三項演算子☆レシピ025☆（「条件式 ? 式1 : 式2」って何ですか？）で検索文字列を有無を判定し処理します。
$data = isset($_POST['data']) ? trim($_POST['data']) : '';
# 入力された検索文字列をexplode()関数で半角スペースで区切って配列に代入します。
# 全角スペースで区切られている場合を考慮し、mb_convert_kata()関数☆レシピ053☆（全角英数字を半角に変換したい）
# で半角スペースに変換しておきます。
$dataList = explode(' ', mb_convert_kana($data, 's'));
# 値が空の要素を削除します☆レシピ096☆（配列の中から条件に合うデータのみを抜き出した配列を作りたい）。
$dataList = array_filter($dataList, function ($val) {
  return $val != '';
});
# 値でソートしてキーを0から振り直します☆レシピ084☆（配列を並べ替えたい）。
sort($dataList);

if (! empty($dataList)) {
# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
  require_once __DIR__ . '/../../../../conf/database_conf.php';

  try {
# MySQLデータベースに接続します☆レシピ260☆（データベースに接続したい）。
    $db = new PDO($dsn, $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# SQL文を準備します。
# 検索文字列の数だけ「:data0」「:data1」…のようにプレースホルダを用意します。
    $where = '';
    foreach ($dataList as $key => $value) {
      $where .= sprintf(' AND data LIKE :data%d', $key);
# SQLiteの場合は、エスケープ文字をAND結合ごとに指定する必要があります。
# ここではエスケープ文字を「\」に設定しています。
//      $where .= " ESCAPE '\\'";
    }
    $sql = 'SELECT * FROM search WHERE 1' . $where;

    $prepare = $db->prepare($sql);

# SQL文のプレースホルダに値をバインドして、クエリを実行します。
    for ($i = 0; $i < count($dataList); $i++) {
# 検索文字列の中のワイルドカード文字「_」「%」およびエスケープ文字「\」を
# エスケープします。
      $like = preg_replace('/([_%\\\\])/u', '\\\\$1', $dataList[$i]);
      $prepare->bindValue(':data' . $i, '%' . $like . '%', PDO::PARAM_STR);
    }
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) == 0) {
      echo '<p>「' . h($data) . '」はデータベースに登録がありません。</p>';
    } else {
      echo '<p>「' . h($data) . '」はデータベースに登録がありました。</p>';

      echo '<p>検索結果</p>';
      echo '<table>';
      echo '  <tr>';
      echo '    <th>ID</th>';
      echo '    <th>データ</th>';
      echo '  </tr>';

      foreach ($result as $row) {
        echo '  <tr>';
        echo '    <td>' . h($row['id']) . '</td>';
        echo '    <td>' . h($row['data']) . '</td>';
        echo '  </tr>';
      }
      echo '</table>';
    }

    $sql = 'SELECT * FROM search';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

    echo '<p>データベースの内容一覧</p>';
    echo '<table>';
    echo '  <tr>';
    echo '    <th>ID</th>';
    echo '    <th>データ</th>';
    echo '  </tr>';

    foreach ($result as $row) {
      echo '  <tr>';
      echo '    <td>' . h($row['id']) . '</td>';
      echo '    <td>' . h($row['data']) . '</td>';
      echo '  </tr>';
    }
    echo '</table>';

# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
  } catch (PDOException $e) {
    echo 'エラーが発生しました。内容: ' . h($e->getMessage());
  }
}
?>
<p>AND検索したい文字列を入力してください(スペース区切り)</p>
<form method="post" action="explode.php">
  <input type="search" name="data">
  <input type="submit" value="検索する">
</form>
</div>
</body>
</html>
