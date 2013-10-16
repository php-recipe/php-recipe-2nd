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

# 文字の背景を白に設定します。
$pdf->SetFillColor(255, 255, 255, true);

# ページを追加します。
$pdf->AddPage();

# 直線を描きます。
// 2mm幅、線端（butt）、実線、色（CMYK：黄）
$style1 = array('width' => 2, 'cap' => 'butt', 'color' => array(0,0,100,0));
$pdf->Line(5, 10, 205, 10, $style1);

// 2mm幅、線端（round）、実線、色（RGB：赤）
$style2 = array('width' => 2, 'cap' => 'round', 'color' => array(255, 0, 0));
$pdf->Line(5, 20, 205, 20, $style2);

// 2mm幅、線端（square）、実線、色（グレースケール）
$style3 = array('width' => 2, 'cap' => 'square', 'color' => array(80));
$pdf->Line(5, 30, 205, 30, $style3);

// 2mm幅、線端（butt）、破線、色（RGB：青）
$style4 = array('width' => 2, 'cap' => 'butt',
                'dash' => '2,10', 'color' => array(0, 0, 255));
$pdf->Line(5, 40, 205, 40, $style4);

// 2mm幅、線端（round）、破線、色（RGB：青）
$style5 = array('width' => 2, 'cap' => 'round',
                'dash' => '2,10', 'color' => array(0, 0, 255));
$pdf->Line(5, 50, 205, 50, $style5);

// 2mm幅、線端（square）、破線、色（RGB：青）
$style6 = array('width' => 2, 'cap' => 'square',
                'dash' => '2,10', 'color' => array(0, 0, 255));
$pdf->Line(5, 60, 205, 60, $style6);

# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
header('X-Content-Type-Options: nosniff');
# PDFを動的に出力します。
$pdf->Output();

/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
