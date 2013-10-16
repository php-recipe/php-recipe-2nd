<?php
/**
 * メール送信内容ファイル出力スクリプト

 * このファイルは『PHP逆引きレシピ 第2版』のサンプルコードの一部です。
 *
 * @author    Yuta Sakurai
 * @license   BSD 3-Clause License
 * @copyright 2013 Kenji Suzuki, Kenichi Ando, Naoaki Yamada, Yoshiyuki Yamamoto, Yuta Sakurai, Hitoshi Asano
 * @link      http://php-recipe.com/

 * 説明:
 * 標準出力から受け取ったメールデータを、見やすい形でファイルに出力します。
 * mb_send_mail()などを利用したメール送信処理の動作テストにお使いください。
 *
 * 設置方法:
 * php.iniに、下記の設定を追記します。
 * XAMPP、MAMPの設置場所や本スクリプトの場所に合わせて、設定を適宜修正してください。
 * 
 * XAMPPでのphp.ini設定：
 * sendmail_path="C:\xampp\php\php.exe C:\Users\ユーザー名\php-recipe\lib\mailoutput.php"
 * 
 * MAMPでのphp.ini設定：
 * sendmail_path = "/Applications/MAMP/bin/php/php（バージョン番号）/bin/php /Users/ユーザー名/php-recipe/lib/mailoutput.php"
 *
 * ファイル出力先：
 * デフォルトでは、本スクリプト設置ディレクトリ直下に"mailoutput"ディレクトリを作成し、そこを保存先とします。
 * また、ファイル名は"mail_（受信日）_（マイクロ秒）.txt"となっており、受信日付、および時刻をミリ秒単位で表現した文字列を末尾に追加したファイル名で保存されます。
 * スクリプト内の$logfile_dir、$logfile_base_nameに代入する文字列を修正することで、任意の出力先に変更可能です。
 */

require_once __DIR__ . '/MailParser/Parser.php';

use MailParser\Parser;

// ログファイル保存先設定
$logfile_dir = __DIR__ . '/mailoutput';
// ログファイル名設定
$logfile_base_name = 'mail_' . date('Ymd');

// 保存先ディレクトリが無ければ作成
if (! is_dir($logfile_dir) && ! mkdir($logfile_dir, 0777, true)) {
  trigger_error("保存先ディレクトリ ${logfile_dir} を作成できません。", E_USER_ERROR);
}

// メール内容を標準入力から取り込み
$raw_mail_data = '';
while ($line = fgets(STDIN)) {
  $raw_mail_data .= $line;
}

// メール解析処理
$parsed_contents = Parser::parse($raw_mail_data);

// 出力テキスト生成
$root_content = array_shift($parsed_contents);
$decoded_header = '***** デコード済みヘッダー *****';
$decoded_header .= $root_content->getHeaderStrings();

$decoded_body = '***** デコード済み本文 *****';
if (count($parsed_contents)) {
  foreach ($parsed_contents as $i => $content) {
    if ($i >= 1) {
      $decoded_body .= "\n===== 添付ファイル({$i}) =====";
    }

    $decoded_body .= $content->getHeaderStrings();

    if ($content->isMulti()) {
      continue;
    }

    $decoded_body .= "\n\n{$content->getDecodedData()}";
  }
} else {
  $decoded_body .= "\n{$root_content->getDecodedData()}";
}

$decoded_mail_data = "{$decoded_header}\n\n{$decoded_body}";
// 改行コード統一
$decoded_mail_data = preg_replace('/\r?\n/m', "\r\n", $decoded_mail_data);

// 出力先絶対パス決定
$mtime = str_replace('.', '', microtime(true));
$logfile_fullpath = "{$logfile_dir}/{$logfile_base_name}_{$mtime}.txt";

// ファイル書き出し
$logfile_handle = fopen($logfile_fullpath, 'w');
fwrite($logfile_handle, $decoded_mail_data);

return 0;
