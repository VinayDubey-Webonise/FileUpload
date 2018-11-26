<?php

function validateTitle($articleTitle) {
  if (!isset($articleTitle)) {
      die("No title found");
  }

  if (strlen($articleTitle)>100) {
      die("Title cannot have more than 100 characters");
  }
}

function validateImage($articleImage) {
  if(isset($articleImage)){
      $errors= array();
      $fileName = $articleImage['name'];
      $fileSize = $articleImage['size'];
      $fileTmp = $articleImage['tmp_name'];
      $fileType = $articleImage['type'];
      @$fileExt = strtolower(end(explode('.',$fileName)));
      
      $expensions = array("jpeg","jpg","png");
      
      if (in_array($fileExt,$expensions)=== false) {
         $errors[]="extension not allowed, please choose a JPEG, JPG or PNG file.";
      }
      
      if ($fileSize > 3097152) {
         $errors[]='File size must be smaller than 3 MB';
      }
      
      if (empty($errors)==true) {
         move_uploaded_file($fileTmp,"images/".$fileName);
         echo "Image successfully uploaded<br>";
      }else{
         print_r($errors);
      }
   }
}

function validateDocument($articleDocument) {
 if(isset($articleDocument)){
     $errors= array();
     $fileName = $articleDocument['name'];
     $fileSize = $articleDocument['size'];
     $fileTmp = $articleDocument['tmp_name'];
     $fileType = $articleDocument['type'];
     @$fileExt = strtolower(end(explode('.',$fileName)));
     
     $expensions = array("doc","docx");
     
     if (in_array($fileExt,$expensions)=== false) {
        $errors[]="extension not allowed, please choose a docx file.";
     }
     
     if ($fileSize > 10097152) {
        $errors[]='File size must be smaller than 10 MB';
     }
     
     if (empty($errors)==true) {
        move_uploaded_file($fileTmp,"documents/".$fileName);
        echo "Document successfully uploaded<br>";
     }else{
        print_r($errors);
     }
  }
}
