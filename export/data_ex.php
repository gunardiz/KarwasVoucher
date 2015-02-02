<?php
error_reporting(E_ALL);
require_once '../Classes/PHPExcel.php';
include "../includes/fungsi_indotgl.php";
$datepr=date('d-m-Y');  
$datett=date('d M Y');  
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("karwas") or die(mysql_error());
$query = "SELECT * FROM data, wilayah WHERE data.id_wilayah=wilayah.id_wilayah ORDER BY id_dokumen DESC";
$hasil = mysql_query($query);

// Set properties
$objPHPExcel->getProperties()->setCreator("PLPSE")
->setLastModifiedBy("PLPSE")
->setTitle("Data Karwas")
->setSubject("Data Karwas")
->setDescription("Data Seluruh Karwas Voucher")
->setKeywords("office 2007 openxml php")
->setCategory("Karwas Voucher");

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A2', 'Data Karwas Voucher'.' - '.$datett)
->setCellValue('A3', 'No.')
->setCellValue('B3', 'Berkas Diterima Petugas')
->setCellValue('C3', 'Unit Layanan')
->setCellValue('D3', 'Wilayah')
->setCellValue('E3', 'Jenis Dokumen')
->setCellValue('F3', 'Periode')
->setCellValue('G3', 'Nilai Pengajuan')
->setCellValue('H3', 'Diterima Kasubag')
->setCellValue('I3', 'Status')
->setCellValue('J3', 'Diterima PPK')
->setCellValue('K3', 'Status')
->setCellValue('L3', 'Diterima Bendahara')
->setCellValue('M3', 'Tanggal Transfer')
->setCellValue('N3', 'Nilai Transfer')
->setCellValue('O3', 'Tanggal DRPP')
->setCellValue('P3', 'Nomor DRPP');
	  	  		
$rowNya = 4;
$no = 0;
while($row=mysql_fetch_array($hasil)){
$tgl_diterima_petugas	= tgl_indo($row['tgl_diterima_petugas']);
$tgl_diterima_ppk		= tgl_indo($row['tgl_diterima_ppk']);
$tgl_diterima_bendahara  = tgl_indo($row['tgl_diterima_bendahara']);
$tgl_diterima_kasubag	= tgl_indo($row['tgl_diterima_kasubag']);
$tgl_transfer			= tgl_indo($row['tgl_transfer']);
$tgl_drpp				= tgl_indo($row['tgl_drpp']);

$np = $row['nilai_pengajuan'];
$nt = $row['nilai_transfer'];

$nilai_pengajuan=number_format($np,0,',',',');
$nilai_transfer1=number_format($nt,0,',',',');

if ((!empty ($row['status1']))){$status1=$row['status1'];}					else{$status1='-';};
if ((!empty ($row['status2']))){$status2=$row['status2'];} 					else{$status2='-';};
if ((!empty ($row['no_drpp']))){$no_drpp=$row['no_drpp'];} 					else{$no_drpp='-';};
if ((!empty ($row['no_drpp']))){$nilai_transfer2="Rp"." ".$nilai_transfer1; } else{$nilai_transfer2='-';};

$tgl1 = $row['tgl_diterima_kasubag'];	if($tgl1=='0000-00-00'){$tgl_diterima_kasubag2="-";}	else{$tgl_diterima_kasubag2=$tgl_diterima_kasubag;}
$tgl2 = $row['tgl_diterima_ppk'];		if($tgl2=='0000-00-00'){$tgl_diterima_ppk2="-";}		else{$tgl_diterima_ppk2=$tgl_diterima_ppk;}
$tgl3 = $row['tgl_diterima_bendahara']; if($tgl3=='0000-00-00'){$tgl_diterima_bendahara2="-";}  else{$tgl_diterima_bendahara2=$tgl_diterima_bendahara;}
$tgl4 = $row['tgl_transfer'];			if($tgl4=='0000-00-00'){$tgl_transfer2="-";}			else{$tgl_transfer2=$tgl_transfer;}
$tgl5 = $row['tgl_drpp'];				if($tgl5=='0000-00-00'){$tgl_drpp2="-";}				else{$tgl_drpp2=$tgl_drpp;}
								 
$no = $no +1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A$rowNya", $no)
->setCellValue("B$rowNya", $tgl_diterima_petugas)
->setCellValue("C$rowNya", $row['unit_layanan'])
->setCellValue("D$rowNya", $row['nm_wilayah'])
->setCellValue("E$rowNya", $row['jenis_dokumen'])
->setCellValue("F$rowNya", $row['periode'])
->setCellValue("G$rowNya", "Rp"." ".$nilai_pengajuan)
->setCellValue("H$rowNya", $tgl_diterima_kasubag2)
->setCellValue("I$rowNya", $status1)
->setCellValue("J$rowNya", $tgl_diterima_ppk2)
->setCellValue("K$rowNya", $status2)
->setCellValue("L$rowNya", $tgl_diterima_bendahara2)
->setCellValue("M$rowNya", $tgl_transfer2)
->setCellValue("N$rowNya", $nilai_transfer2)
->setCellValue("O$rowNya", $tgl_drpp2)
->setCellValue("P$rowNya", $no_drpp);

$rowNya = $rowNya + 1;
}

// TABLE PROPERTIES
// CELL WIDTH
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

// ORIENTATION
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

// TITLE
$objPHPExcel->getActiveSheet()->mergeCells('A2:P2');
$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// HEADER FOOTER
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&B DATA KARWAS VOUCHER &RPer Tanggal &D');
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');

// TABLE HEADER PROPERTIES
// FONT BOLD

// HEADER 1 FONT SIZE
$objPHPExcel->getActiveSheet()->getStyle("A2:P2")->getFont()->setSize(12);

// ALIGNMENT
$objPHPExcel->getActiveSheet()->getStyle('A2:P3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle("A2:P$rowNya")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

// BACKGROUND COLOR
$objPHPExcel->getActiveSheet()->getStyle('A2:P3')->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('rgb' => 'CCCCCC')
							),
		 )
	);

// HEADER BORDER
$styleThinBlackBorderOutline = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
			'color' => array('argb' => 'FF000000'),
		),
	),
);
$objPHPExcel->getActiveSheet()->getStyle('A2:P2')->applyFromArray($styleThinBlackBorderOutline);

// HEADER 2
$styleMedHeader =
	array('borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM ),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM ),
								'left'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM ),
								'inside'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN ),
								'color' => array('argb' => 'FF000000')
							)
		 );
$objPHPExcel->getActiveSheet()->getStyle('A3:P3')->applyFromArray($styleMedHeader);

// QUERY PROPERTIES
// ALIGNMENT
$objPHPExcel->getActiveSheet()->getStyle("A4:A$rowNya")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);




// TEXT WRAPPING
$objPHPExcel->getActiveSheet()->getStyle("A4:P$rowNya")->getAlignment()->setWrapText(true);

// BORDER
$styleThinBlackBorderOutline = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
			'color' => array('argb' => 'FF000000'),
		),
		'inside' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
);
$objPHPExcel->getActiveSheet()->getStyle("A4:P$rowNya")->applyFromArray($styleThinBlackBorderOutline);

// FONT 
$objPHPExcel->getActiveSheet()->getStyle("A3:P$rowNya")->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle("A2:P$rowNya")->getFont()->setName('Arial');


// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Karwas Voucher'.' '.$datepr);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DATA_KARWAS_VOUCHER'.'_'.$datepr.'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>