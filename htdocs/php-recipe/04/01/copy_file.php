<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルをコピーしたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# ファイル名を設定します。
// コピー元ファイル
$fileName = '../../../../data/moto.txt';
// コピー先ファイル
$copyFileName = '../../../../data/output/copy.txt';

if (isset($_POST['overwrite'])) {
# overwrite=1がPOSTされた場合trueを、POSTされない場合はfalseをセットします。
  $overwrite = $_POST['overwrite'] == 1 ? true : false;

# ファイルをコピーします。
  if (fileCopy($fileName, $copyFileName, $overwrite)) {
    echo '<p>', h($fileName) . ' から ' . h($copyFileName);
    echo ' へファイルのコピーに成功しました。</p>';
  } else {
    echo '<p>', h($fileName) . ' から ' . h($copyFileName);
    echo ' へファイルのコピーに失敗しました。</p>';
  }
} else {
# 上書きコピーの選択フォームを表示します。
  $form = <<<END
    <form method="post" action="copy_file.php">
      <p>コピー元ファイル名：%s </p>
      <p>コピー先ファイル名：%s </p>
      コピー先にファイルが存在する場合、上書きコピーを行ないますか？<br>
      <input type="radio" name="overwrite" value="1" checked>はい
      <input type="radio" name="overwrite" value="0">いいえ<br>
      <input type="submit" value="コピーします">
    </form>
END;
  echo sprintf($form, h($fileName), h($copyFileName));
}

# ファイルをコピーするユーザー定義関数です。
// $fromFile  : コピー元ファイル
// $toFile    : コピー先ファイル
// $overwrite : 上書き指定 true（上書き・デフォルト）、false（上書きしない）
// 戻り値     : true（コピー成功）、false（コピー失敗）
function fileCopy($fromFile, $toFile, $overwrite = true)
{
# コピー元ファイルの存在を確認します。
  if (! file_exists($fromFile)) {
    echo '<p>コピー元のファイル ' . h($fromFile) . ' が存在しません。</p>';
    return false;
  }
# コピー先のディレクトリを確認します。
  if (! is_writable(dirname($toFile))) {
    die('コピー先のディレクトリが書き込めない、または存在しません。');
  }
# コピー先のファイルが存在するか確認します。
  if (file_exists($toFile)) {
    echo '<p>コピー先のファイル ' . h($toFile) . ' は存在しています。</p>';
# $overwriteがfalseの場合、コピーをしません。
    if (! $overwrite) {
      return false;
    }
# コピー先のファイルが書き込み可能か確認します。
    if (! is_writable($toFile)) {
      echo '<p>コピー先のファイル ' . h($toFile) . ' は書き込めません。</p>';
      return false;
    }
    echo '<p>上書きコピーを行ないます。</p>';
  }
# ファイルをコピーします。
  if (copy($fromFile, $toFile)) {
    return true;
  } else {
    return false;
  }
}
?>
</div>
</body>
</html>
