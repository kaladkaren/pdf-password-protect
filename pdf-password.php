<?php
// function pdfEncrypt ($origFile, $password, $destFile){
// //include the FPDI protection http://www.setasign.de/products/pdf-php-solutions/fpdi-protection-128/
// require_once('fpdi/FPDI_Protection.php');

// $pdf = new FPDI_Protection();
// // set the format of the destinaton file, in our case 6×9 inch
// $pdf->FPDF('P', 'in', array('6','9'));

// //calculate the number of pages from the original document
// $pagecount = $pdf->setSourceFile($origFile);

// // copy all pages from the old unprotected pdf in the new one
// for ($loop = 1; $loop <= $pagecount; $loop++) {
//     $tplidx = $pdf->importPage($loop);
//     $pdf->addPage();
//     $pdf->useTemplate($tplidx);
// }

// // protect the new pdf file, and allow no printing, copy etc and leave only reading allowed
// $pdf->SetProtection(array(),$password);
// $pdf->Output($destFile, 'F');

// return $destFile;
// }

// //password for the pdf file
// $password = 'info@domain.com';

// //name of the original file (unprotected)
// $origFile = 'karen-doc.pdf';

// //name of the destination file (password protected and printing rights removed)
// $destFile ='karen-doc.pdf';

// //encrypt the book and create the protected file
// pdfEncrypt($origFile, $password, $destFile );

require "password-protected.php";
#### SOURCE: https://www.webniraj.com/2018/08/15/dynamically-adding-passwords-to-pdfs-using-php/

try {
    $pdf = new PasswordProtectPDF("karen-doc.pdf", "mypassword");
    // render the PDF inline (i.e. within browser where supported)
    $res = $pdf->setTitle("Karen Test PDF")->output('F', 'karen-doc.pdf'); 
    # I = Inline PDF
    # S = PDF as a string for you to handle manually (i.e. with manual headers to force inline rendering or download)
    # D = Forcing the PDF to download to the user’s device, using the second parameter as the filename.
    # F = Saving the PDF to the server as a file, using the second parameter as the file path and name. 
    if($res){
        echo 'PDF Password Protected!';
    }

} catch (\Exception $e) {
    // catch any errors in rendering the PDF
    if ($e->getCode() == 267) {
      die('The compression on this file is not supported.');
    }
    die('This PDF document is encrypted and cannot be processed.');
}

exit;

// $pdf = new PasswordProtectPDF("karen-doc.pdf", "mypassword");
// // force the PDF to download to filename specified
// $pdf->setTitle("Test PDF")->output('D', 'karen-doc.pdf');

// exit;

// $pdf = new PasswordProtectPDF("karen-doc.pdf", "mypassword");
// // save PDF as file on the server
// $pdf->setTitle("Karen 3 Test PDF")->output('F', 'karen-doc.pdf');

// exit;
?>