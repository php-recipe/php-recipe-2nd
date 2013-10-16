<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>複数の画像をアップロードさせたい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

$dir = '../../img/upload';  // アップロードした画像を配置するパス
const MAX_SIZE = 102400;    // 最大ファイルサイズ

# php.iniのpost_max_sizeを超えたデータが送信されていないか確認します。
if (! checkPostMaxSize()) {
  echo 'ファイルサイズは100KB以下にしてください<br><br>';
}

# ファイルがアップロードされているかを確認します。
if (isset($_FILES['uploadfile'])) {
# 繰り返し処理します。
  for ($i = 0; $i < count($_FILES['uploadfile']['name']); $i++) {

# アップロードファイルをチェックします。
    list($result, $ext, $error_msg) = checkFile($i);
    if ($result) {
      $name     = $_FILES['uploadfile']['name'][$i];
      $tmp_name = $_FILES['uploadfile']['tmp_name'][$i];

# ここでは格納ディレクトリの下に「"upfile_" + 現在のタイムスタンプ + 連番 + "_"
# + マイクロ秒と元ファイル名とアクセス元IPアドレスに基づくMD5 + 拡張子」で配置
# します。
        $move_to = $dir . '/upfile_' . time() . $i . '_'
                  . md5(microtime() . $name . $_SERVER['REMOTE_ADDR'])
                  . '.' . $ext;
# アップロードした一時ファイルを指定した場所へ移動します。
        if (move_uploaded_file($tmp_name, $move_to)) {
# 画像ファイルを表示します。
          echo h($move_to) . '<br>';
          echo '<img src="' . h($move_to) . '" alt="アップロードされた画像"><br>';
        } else {
          $error_msg[] = '画像のアップロードに失敗しました';
        }
    }

# エラーメッセージがあれば表示します。
    if (count($error_msg) > 0) {
      foreach ($error_msg as $msg) {
        echo h($msg) . '<br>';
      }
    }
  }
}

function checkFile($i)  // アップロードファイルをチェックする関数
{
  $error_msg = array();
  $ext       = '';

  $size     = $_FILES['uploadfile']['size'][$i];
  $error    = $_FILES['uploadfile']['error'][$i];
  $img_type = $_FILES['uploadfile']['type'][$i];
  $tmp_name = $_FILES['uploadfile']['tmp_name'][$i];

  if ($error != UPLOAD_ERR_OK) {  // アップロードエラーの場合
    if ($error == UPLOAD_ERR_NO_FILE) {
      // アップロードされなかった場合はエラー処理を行なわない
    } elseif ($error == UPLOAD_ERR_INI_SIZE || 
              $error == UPLOAD_ERR_FORM_SIZE) { // ファイルサイズエラー
      $error_msg[] = 'ファイルサイズは100KB以下にしてください';
    } else {  // その他のエラーの場合
      $error_msg[] = 'アップロードエラーです';
    }
    return array(false, $ext, $error_msg);
  } else {  // アップロードエラーでない場合
    // 送信されたMIMEタイプから拡張子を決定
    if ($img_type == 'image/gif') {
      $ext = 'gif';
    } elseif ($img_type == 'image/jpeg' || $img_type == 'image/pjpeg') {
      $ext = 'jpg';
    } elseif ($img_type == 'image/png' || $img_type == 'image/x-png') {
      $ext = 'png';
    }

# 画像ファイルのMIMEタイプを判定☆レシピ124☆（ファイルの種類を判定したい）します。
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $finfoType = $finfo->file($tmp_name);

# 画像ファイルのサイズ下限をチェックします。
    if ($size == 0) {
      $error_msg[] = 'ファイルが存在しないか空のファイルです';
# 画像ファイルのサイズ上限をチェックします。
    } elseif ($size > MAX_SIZE) {
      $error_msg[] = 'ファイルサイズは100KB以下にしてください';
# 送信されたMIMEタイプと、画像ファイルのMIMEタイプが一致するかを確認します。
    } elseif ($img_type != $finfoType) {
      $error_msg[] = 'MIMEタイプが一致しません';
# 画像ファイルの拡張子をチェックします。
    } elseif ($ext != 'gif' && $ext != 'jpg' && $ext != 'png') {
      $error_msg[] = 'アップロード可能なファイルはgif、jpg、pngのみです';
    } else {
      return array(true, $ext, $error_msg);
    }
  }
  return array(false, $ext, $error_msg);
}

// php.iniのpost_max_sizeを超えたデータが送信されていないかチェックする関数
function checkPostMaxSize()
{
  $max_size = ini_get('post_max_size');
  // post_max_sizeが8Mのように設定されていた場合に整数にする
  $multiple = 1;
  $unit = substr($max_size, -1);
  if ($unit == 'M') {
    $multiple = 1024 * 1024;
  } elseif ($unit == 'K') {
    $multiple = 1024;
  } elseif ($unit == 'G') {
    $multiple = 1024 * 1024 * 1024;
  }
  $max_size = substr($max_size, 0, strlen($max_size) - 1) * $multiple;

  // post_max_sizeを超えたデータがPOSTされたかどうかチェック
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
      $_SERVER['CONTENT_LENGTH'] > $max_size) {
      return false;
    } else {
      return true;
  }
}
?>
  <hr>
  <p>アップロードしたい画像ファイル(gif、jpg、png形式のみ)を指定してください</p>
  <form method="post" action="upload_multi_images.php"
        enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_SIZE); ?>">
    <input type="file" name="uploadfile[]"><br>
    <input type="file" name="uploadfile[]"><br>
    <input type="file" name="uploadfile[]"><br>
    <input type="submit" value="送信する"><br>
    ※画像サイズは1画像につき100KB以下
  </form>
</div>
</body>
</html>
