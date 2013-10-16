<?php
// FPDIでStrictエラーが発生するので抑制
error_reporting(E_ALL & ~E_STRICT);

# TCPDF、FPDIをインクルードします（パスを適切に設定してください）。
require_once '../../../../lib/tcpdf/tcpdf.php';
require_once '../../../../lib/fpdi/fpdi.php';

# FPDIオブジェクトをnew演算子☆レシピ154☆（クラスを使いたい）で作成します。
$pdf = new FPDI();

# 読み込むPDFファイルを相対パスで設定します。
$pdfFile = 'kison-pdf.pdf';
// インポート元のPDFへのリンク用URL
$url = 'http://' . $_SERVER['HTTP_HOST'] . '/php-recipe/04/03/kison-pdf.pdf';

# PDFファイルを読み込みます（戻り値はページ数）。
$pageCount = $pdf->setSourceFile($pdfFile);

# 文書のプロパティを設定します。
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('作成者');
$pdf->SetTitle('タイトル');
$pdf->SetSubject('サブタイトル');
$pdf->SetKeywords('キーワード, PHP逆引きレシピ');

# ヘッダー／フッターを削除します。
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

# 文字フォントをTCPDFに同梱の「kozgopromedium」、14ポイントに設定します。
$pdf->SetFont('kozgopromedium', '', 14);
$pdf->SetTextColor(255, 0, 0);

# 1ページずつセットしていきます。
for ($i = 1; $i <= $pageCount; $i++) {
  $pdf->AddPage();
  $tplIdx = $pdf->importPage($i);
  $pdf->useTemplate($tplIdx);

# ページ番号、コピーライト、日時などを書き込みます。
  // 追加の書き込みは元のPDFファイルへのリンクになる
  // 引数（1:行高, 2:文字列, 3:リンク）
  $add = $i . 'ページ (c) 2013 php-recipe.com ' . date('Y-m-d H:i:s');
  $pdf->Write(8, $add, $url . '#page=' . $i);
}

# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
# PDFを動的に出力します。
$pdf->Output();

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
