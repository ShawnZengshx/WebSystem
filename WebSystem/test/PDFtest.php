<?php

require_once ('../resource/TCPDF/tcpdf.php');


/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 12:27 PM
 */

//实例化
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// 设置文档信息
$pdf->SetCreator('Helloweba');
$pdf->SetAuthor('yueguangguang');
$pdf->SetTitle('Welcome to helloweba.com!');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, PHP');

// 设置页眉和页脚信息
$pdf->SetHeaderData('logo.png', 30, 'Helloweba.com', '致力于WEB前端技术在中国的应用',
    array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// 设置页眉和页脚字体
$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));
$pdf->setFooterFont(Array('helvetica', '', '8'));

// 设置默认等宽字体
$pdf->SetDefaultMonospacedFont('courier');

// 设置间距
$pdf->SetMargins(15, 27, 15);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(10);

// 设置分页
$pdf->SetAutoPageBreak(TRUE, 25);

// set image scale factor
$pdf->setImageScale(1.25);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

//设置字体
$pdf->SetFont('stsongstdlight', '', 14);

$pdf->AddPage();

$str1 = '欢迎来到Helloweba.com';

$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);

//输出PDF
$pdf->Output('t.pdf', 'I');