<?php
# TCPDFをインクルードします（パスを適切に設定してください）。
require_once '../../../../lib/tcpdf/tcpdf.php';

# TCPDFオブジェクトをnew演算子☆レシピ154☆（クラスを使いたい）で作成します。
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT);

# 文書のプロパティを設定します。
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('作成者');
$pdf->SetTitle('タイトル');
$pdf->SetSubject('サブタイトル');
$pdf->SetKeywords('キーワード, PHP逆引きレシピ');

# ヘッダー／フッターを削除します。
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

# マージンを設定します。
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
# 自動改ページを有効にします。
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

# 文字フォントをTCPDFに同梱の「kozgopromedium」、14ポイントに設定します。
$pdf->SetFont('kozgopromedium', '', 14);
# 文字の背景を白に設定します。
$pdf->SetFillColor(255, 255, 255, true);

# ページを追加します。
$pdf->AddPage();

# テキストファイルの中身を変数に代入します。
$text = file_get_contents('../../../../data/pdf-text.txt');

# テキストを出力します。
$pdf->Write(5, $text);

# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
# PDFを動的に出力します。
$pdf->Output();

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
