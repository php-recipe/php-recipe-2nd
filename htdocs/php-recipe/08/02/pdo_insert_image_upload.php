<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>イメージデータを格納したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$max_size = 4 * 1024 * 1024;  // 最大4MB
$file_uploaded = false;

# ファイルがアップロードされた場合、画像かどうかの確認を行ないます。
if (isset($_FILES['image'])) {
# アップロードされた画像のチェックを行ないます。
  if (! check_image()) {
    echo '<p>アップロードされたファイルはJPEG画像でないか、または処理できない画像です。</p>';
# 画像のファイルサイズのチェックを行ないます。
  } elseif ($_FILES['image']['size'] > $max_size) {
    echo '<p>ファイルサイズが4MB以下のものをアップロードしてください。</p>';
# 画像ファイルをfopen()関数で開きます。
  } elseif (! $file = fopen($_FILES['image']['tmp_name'], 'rb')) {
    echo '<p>画像を開けませんでした。</p>';
  } else {
# 画像ファイルをfread()関数で読み込みます。
    $image = fread($file, $_FILES['image']['size']);
    fclose($file);
    if (! $image) {
      echo '<p>画像を読み込めませんでした。</p>';
    } else {
      $file_uploaded = true;
    }
  }
}

# 画像が正常にアップロードされていれば、データベースに追加します。
if ($file_uploaded == true) {
# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
  require_once __DIR__ . '/../../../../conf/database_conf.php';

  try {
# MySQLデータベースに接続します☆レシピ260☆（データベースに接続したい）。
    $db = new PDO($dsn, $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# SQL文を準備します。
    $sql = 'INSERT INTO images (image) VALUES (:image)';
    $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
    $prepare->bindValue(':image', $image, PDO::PARAM_LOB);
    $prepare->execute();
# 追加したレコードのIDを取得します。
    $id = $db->lastInsertId();
# 追加に成功した場合、画像表示ページへのリンクを表示します。
    echo '<p><a href="pdo_insert_image_view.php?id='
      . h($id) . '">アップロードした画像を表示する</a></p>';
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
  } catch (PDOException $e) {
    echo 'エラーが発生しました。内容: ' . h($e->getMessage());
  }
}

# 画像形式をチェックし、画像かどうかの判定を行なう関数です。
function check_image()
{
  $tmp_name = $_FILES['image']['tmp_name'];

# 画像がアップロードされたファイルかどうかをチェックします。
  if (! is_uploaded_file($tmp_name)) {
    return false;
  }
# 画像の種類がJPEGかをfinfoクラス☆レシピ124☆（ファイルの種類を判定したい）で確認します。
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $type = $finfo->file($tmp_name);
  if ($type !== 'image/jpeg') {
    return false;
  }

  return true;
}
?>
<p>JPEG画像のみアップロードできます(4MBまで)</p>
<form method="post" action="pdo_insert_image_upload.php" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h($max_size); ?>">
<input type="file" name="image" value="">
<input type="submit" name="submit">
</form>
</div>
</body>
</html>
