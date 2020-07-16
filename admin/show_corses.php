<?php
if (isset($_GET['do'])) {
  $do = isset($_GET['do']) ? $_GET['do'] : '';
  // The location of the PDF file 
  // on the server 
  $filename = "uplodes/file_item/$do.pdf";

  // Header content type 
  header("Content-type: application/pdf");

  header("Content-Length: " . filesize($filename));

  // Send the file to the browser. 
  readfile($filename);

} elseif (isset($_GET['re'])) {
  $do = isset($_GET['re']) ? $_GET['re'] : '';
  // The location of the PDF file 
  // on the server 
  $filename = "uplodes/research/$do";

  // Header content type 
  header("Content-type: application/pdf");

  header("Content-Length: " . filesize($filename));

  // Send the file to the browser. 
  readfile($filename);
}
