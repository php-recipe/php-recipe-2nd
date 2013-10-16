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

# テキストを出力します。
$pdf->Write(8, 'ようこそ、PHP逆引きレシピへ！' . "\n");
// 第6引数にtrueを設定すると改行
// 引数（1:行高, 2:文字列, 3:リンク, 4:背景, 5:行揃え, 6:改行）
$pdf->Write(16, 'ようこそ、PHP逆引きレシピへ！', '', 0, '', true);
$pdf->Write(8, "ようこそ、PHP逆引きレシピへ！\nようこそ、PHP逆引きレシピへ！");

# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
# PDFを動的に出力します。
$pdf->Output();

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
