<?php
require_once 'vendor/autoload.php';
require_once 'readdocx.php';

function documentAppend($documentFilePath, $appendText){
  // read the existing content from file
  $docObj = new DocxConversion($documentFilePath);
  $docText= $docObj->convertToText($documentFilePath);

  $phpWord = new \PhpOffice\PhpWord\PhpWord();

  // appending new data to the existing data
  $newData = $docText.$appendText;

  // Adding an empty Section to the document...
  $section = $phpWord->addSection();
  $section->getStyle()->setBreakType('continuous');
  $section->addText($newData);  

  // Save changes in the file
  $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
  $objWriter->save($documentFilePath);
  return $newData;
}