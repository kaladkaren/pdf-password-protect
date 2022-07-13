<?php 

require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\SimpleType\DocProtect;

// Set PDF renderer.
// Make sure you have `tecnickcom/tcpdf` in your composer dependencies.
Settings::setPdfRendererName(Settings::PDF_RENDERER_TCPDF);
// Path to directory with tcpdf.php file.
// Rigth now `TCPDF` writer is depreacted. Consider to use `DomPDF` or `MPDF` instead.
Settings::setPdfRendererPath('vendor/tecnickcom/tcpdf');

$phpWord = IOFactory::load('my-karen.doc', 'Word2007');

$documentProtection = $phpWord->getSettings()->getDocumentProtection();
$documentProtection->setPassword('myPassword');

$res = $phpWord->save('karen-doc.pdf', 'PDF');

if($res){   
    echo 'Done!';
}
?>