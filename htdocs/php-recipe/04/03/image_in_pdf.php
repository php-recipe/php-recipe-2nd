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

# 画像のスケールを設定します。
$pdf->setImageScale(4);

# 文字の背景を白に設定します。
$pdf->SetFillColor(255, 255, 255, true);

# ページを追加します。
$pdf->AddPage();

# JPEGのクオリティを設定します。
$pdf->setJPEGQuality(75);

# 画像をセットします。
$pdf->Image('../../../../data/pdf-image.jpg', 10, 10);

# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
# PDFを動的に出力します。
$pdf->Output();

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
