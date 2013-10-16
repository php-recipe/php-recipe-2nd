<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# クリックジャッキング対策☆レシピ290☆（クリックジャッキングとは？）をします。
header('X-FRAME-OPTIONS: SAMEORIGIN');

# セッションを開始します。
session_start();

# 固定トークン☆レシピ289☆（CSRFとは？）を生成してセッション変数に保存します。フォームに
# 隠しフィールドで出力します。
if (! isset($_SESSION['token'])) {
  $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
$token = $_SESSION['token'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>メール送信フォーム</title>
</head>
<body>
<div id="mailbox">
  <h1>メール送信フォーム</h1>
<?php
# エラーがあったら表示します。
if (isset($_SESSION['error'])) {
  foreach ($_SESSION['error'] as $value) {
    echo '  <span style="color:red;">' . h($value) . '</span><br>' . "\n";
  }
}

# 三項演算子☆レシピ025☆（「条件式 ? 式1 : 式2」って何ですか？）を使用して、セッションに保存されたデータ
# がある場合、変数に代入します。
$name    = isset($_SESSION['name'])    ? $_SESSION['name']    : '';
$email   = isset($_SESSION['email'])   ? $_SESSION['email']   : '';
$comment = isset($_SESSION['comment']) ? $_SESSION['comment'] : '';
?>
  <p>*印は必須入力項目です。タグは無効化します。</p>
  <form action="mailform_confirm.php" method="post">
    <dl>
      <dt><label for="name">お名前(*)：</label></dt>
      <dd><input type="text" name="name" id="name"
          value="<?php echo h($name); ?>" maxlength="100" required></dd>
    </dl>
    <dl>
      <dt><label for="email">メールアドレス(*)：</label></dt>
      <dd><input type="email" name="email" id="email"
          value="<?php echo h($email); ?>" maxlength="256" required></dd>
    </dl>
    <dl>
      <dt><label for="comment">コメント(*)(500文字以内)：</label></dt>
      <dd><textarea rows="6" cols="30" id="comment" name="comment" 
          maxlength="500" required><?php echo h($comment); ?></textarea></dd>
    </dl>
    <input type="hidden" name="token" value="<?php echo h($token); ?>">
    <input type="submit" name="submit" value="入力内容チェック">
  </form>
</div>
</body>
</html>
