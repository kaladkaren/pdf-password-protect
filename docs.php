<?php 
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\SimpleType\DocProtect;

// ## WORD
// $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007'); 
// $phpWord = $objReader->load('karen.docx');

// $documentProtection = $phpWord->getSettings()->getDocumentProtection();
// $documentProtection->setEditing('readOnly');
// $documentProtection->setPassword('myPassword');

// $objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $res = $objWriter->save('doc-with-pass.doc');

## SET B

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();

$section->addText("Hello World! Its me, Karen. Convert docs to PDF.");
$documentProtection = $phpWord->getSettings()->getDocumentProtection();
$documentProtection->setEditing('readOnly');
$documentProtection->setPassword('myPassword');

$res = $phpWord->save('my-karen.doc', 'Word2007');
if($res){
    echo 'Success!';
}
?>