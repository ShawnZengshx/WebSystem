<?php

require_once ('../resource/TCPDF/tcpdf.php');
require_once('../resource/TCPDF/tcpdf_barcodes_1d.php');

/**
 * Created by PhpStorm.
 * User: 张皖渝
 * Date: 2/28/2019
 * Time: 12:27 PM
 */

include("../Mysql/MysqlConnect.php");
session_start();
//实例化
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// 设置文档信息
$pdf->SetCreator('ETS');
$pdf->SetAuthor('ETS');
$pdf->SetTitle('Confirm Letter');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, PHP');

// 设置页眉和页脚信息
$pdf->SetHeaderData('logo.png', 30, 'Registration Confirmation', 'From ETS',
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
$stuid = $_SESSION['stuid'];
$sql = "select * from stu where stuid='$stuid'";
$ex_sql = "select examroom from stuexam where stuid = '$stuid'";
$stu_info = $conn->query($sql)->fetch_assoc();
$stu_ex_info = $conn->query($ex_sql)->fetch_assoc();
$str1 = '注意事项:';
$content = date("Y/m/d");
$name = $stu_info['stuface'];
$email = $stu_info['stuemail'];
$ETScode = $stu_info['stuid'];
$idenid  = $stu_info['stuidenid'];
$exRoom = $stu_ex_info['examroom'];
$pdf->Cell(30, 6, '考试日期', 1, 0);
$pdf->Cell(120, 6, $content , 1, 1);
$pdf->Cell(30, 6, '学生姓名', 1, 0);
$pdf->Cell(120, 6, $name, 1, 1);
$pdf->Cell(30, 6, "邮箱", 1, 0);
$pdf->Cell(120, 6, $email, 1, 1);
$pdf->Cell(30, 6, 'ETS注册号', 1, 0);
$pdf->Cell(120, 6, $ETScode, 1, 1);
$pdf->Cell(30, 6, '证件号码', 1, 0);
$pdf->Cell(120, 6, $idenid, 1, 1);
$pdf->Cell(30, 6, '考场', 1, 0);
$pdf->Cell(120, 6, $exRoom, 1, 1);
$pdf->Ln(8);
$pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);
$str2 = "• 中国大陆考生必须携带有效的二代居民身份证原件参加考试。这是唯一接受的身份证件。根据中华人民共和国相关法律，任何年 龄的公民，均可在户籍所在地申领居民身份证。请考生确认所持二代身份证仍在有效期内、芯片信息读取功能正常、本人当前相貌无重大改变（如整容、性别改变等）。否则，建议考生立即重新申请新的二代身份证。
";
$pdf->Write(0,$str2,'', 0, 'L', true, 0, false, false, 0);
$str3 = "• 中国台湾考生必须携带有效的台湾地区居民往来大陆通行证原件或台湾居民居住证原件参加考试。";
$str4 = "• 如果对身份证件的要求有任何疑问，请务必在考试日期前联络教育部考试中心托福网考®呼叫中心。";
$pdf->Write(0,$str3,'', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0,$str4,'', 0, 'L', true, 0, false, false, 0);
$pdf->write1DBarcode($ETScode, 'C128');



$pdf->Output('t.pdf', 'I');