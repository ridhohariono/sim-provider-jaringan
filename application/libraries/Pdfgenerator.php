<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once("./vendor/dompdf/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
class Pdfgenerator {
  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new Dompdf();

    //set options
    $dompdf_option = new \Dompdf\Options();
    $dompdf_option->setIsFontSubsettingEnabled(true);
    $dompdf_option->setIsRemoteEnabled(true);
    $dompdf_option->setIsHtml5ParserEnabled(true);
    $dompdf->setOptions($dompdf_option);

    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
      $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
      $output = $dompdf->output();
    }
  }
}