<?php 
// Include autoloader 
require_once 'dompdf/autoload.inc.php';

// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Reference the Options namespace 
use Dompdf\Options; 
 
// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 
 
// Load content from html file 
$html = file_get_contents("test-table-delete-later.php"); 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("codexworld", array("Attachment" => 0));

?>