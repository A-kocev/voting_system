<?php 
require_once('../../dompdf/autoload.inc.php');
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$category = isset($_GET['category']) ? $_GET['category'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$number_of_votes = isset($_GET['number_of_votes']) ? $_GET['number_of_votes'] : '';
$htmlText = "Certificate for " . $name . " with most votes (" . $number_of_votes . ") in the category " . $category;  

$dompdf->loadHtml($htmlText);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();




?>