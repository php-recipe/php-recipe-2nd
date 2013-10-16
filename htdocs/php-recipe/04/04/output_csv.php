<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>CSVファイルを出力したい</title>
</head>
<body>
<div>
<?php
# 保存するファイル名を設定します。
$csvFile = '../../../../data/output/csv-put.csv';
if (! is_dir(dirname($csvFile))) {
  die('保存するディレクトリが存在しません。');
}

# ファイルを追記モードで開きます（ファイルが存在しない場合は新規作成）。
$fp = fopen($csvFile, 'ab');
if (! is_resource($fp)) {
  die('ファイルを開けませんでした。');
}

# ファイルをロックします（排他的ロック）。
flock($fp, LOCK_EX);

# ファイルの中身を空にします。
ftruncate($fp, 0);  // 追記する場合はこの処理は不要

# データを書き込みます。
for ($i = 0; $i < 5; $i++) {
  $csvData = array();
  $csvData[] = $i;
  for ($j = 1; $j <= 3; $j++) {
    $csvData[] = "サンプル$i-$j";
  }
  fputcsv($fp, $csvData);
}

# ファイルのロックを解除します。
fflush($fp);
flock($fp, LOCK_UN);

# ファイルを閉じます。
fclose($fp);

# 保存したCSVファイルを読み込み、画面に表示します。
if (file_exists($csvFile)) {
  echo 'CSVファイルは保存されました。<br>';
  echo '以下は出力されたCSVファイル（' . $csvFile . '）です。<br>';
  $csv = file_get_contents($csvFile);
  echo nl2br(htmlspecialchars($csv, ENT_QUOTES, 'UTF-8'), false);
} else {
  echo 'CSVファイルは保存されませんでした。';
}
?>
</div>
</body>
</html>
