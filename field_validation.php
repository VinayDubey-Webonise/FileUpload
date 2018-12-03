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
      
      $fileAllowedArray = array("image/jpeg","image/jpg","image/png");
      
      // Checking file type
      $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
      $fileType = finfo_file($fileInfo, $fileTmp);

      if (in_array($fileType, $fileAllowedArray)=== false) {
         $errors[]="File not allowed, please choose a JPEG, JPG or PNG file.";
      }
      
      if ($fileSize > 3097152) {
         $errors[]='File size must be smaller than 3 MB';
      }
      
      if (empty($errors)==true) {
         move_uploaded_file($fileTmp,"images/".$fileName);
         echo "Image successfully uploaded<br>";
      }else{
         print_r($errors);
         die("<br>Fix the errors first");
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
     
     $fileAllowedArray = array("application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                           ,"application/msword");
     
     // Checking file type
     $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
     $fileType = finfo_file($fileInfo, $fileTmp);

     if (in_array($fileType, $fileAllowedArray)=== false) {
        $errors[]="File not allowed, please choose a doc and docx file.";
     }

     if ($fileSize > 10097152) {
        $errors[]='File size must be smaller than 10 MB';
     }
     
     if (empty($errors)==true) {
        move_uploaded_file($fileTmp,"documents/".$fileName);
        echo "Document successfully uploaded<br>";
     }else{
        print_r($errors);
        die("<br>Fix the errors first");
     }
  }
}
