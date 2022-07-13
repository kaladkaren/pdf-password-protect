<?php 
// $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2010');

require_once 'vendor/autoload.php';

// $phpword = new \PhpOffice\PhpWord\PhpWord();
// $section = $phpword->addSection();

// $section->addText("Hello World! Its me, Karen.");

// $res = $phpword->save('./karen.docx', 'Word2007');

## WORD
// $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
// $phpWord = $objReader->load('karen.docx');

// $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $res = $objWriter->save('my-karen.doc');

## PDF
// $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
// $phpWord = $objReader->load('my-karen.doc');

// // var_dump($phpWord); die();

// $rendererName = \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;

// // $rendererLibraryPath =  realpath('/vendor/tecnickcom');
// $rendererLibraryPath = realpath(PHPWORD_TESTS_BASE_DIR . '/../vendor/tecnickcom/tcpdf');
// var_dump($rendererLibraryPath); die();
// // if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendererName, $rendererLibraryPath)){
// //     die('NOTICE: Hey');
// // }

// $rendererLibraryPath = '' . $rendererLibrary;

// $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
// $res = $objWriter->save('my-karen-.pdf');


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

// Set PDF renderer.
// Make sure you have `tecnickcom/tcpdf` in your composer dependencies.
Settings::setPdfRendererName(Settings::PDF_RENDERER_TCPDF);
// Path to directory with tcpdf.php file.
// Rigth now `TCPDF` writer is depreacted. Consider to use `DomPDF` or `MPDF` instead.
Settings::setPdfRendererPath('vendor/tecnickcom/tcpdf');

$phpWord = IOFactory::load('my-karen.doc', 'Word2007');

$documentProtection = $phpWord->getSettings()->getDocumentProtection();
$documentProtection->setPassword('myPassword');
$res = $phpWord->save('document.pdf', 'PDF');

if($res){   
    echo 'Done!';
}
?>