<?php
include ('connection.php');

$articleTitle = $_POST['articleTitle'];
$articleImage = $_FILES['imageFile'];
$articleDocument = $_FILES['documentFile'];

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
        
        $expensions= array("jpeg","jpg","png");
        
        if (in_array($fileExt,$expensions)=== false) {
           $errors[]="extension not allowed, please choose a JPEG, JPG or PNG file.";
        }
        
        if ($fileSize > 2097152) {
           $errors[]='File size must be smaller than 2 MB';
        }
        
        if (empty($errors)==true) {
           move_uploaded_file($fileTmp,"images/".$fileName);
           echo "Success";
        }else{
           print_r($errors);
        }
     }
}

validateTitle($articleTitle);
validateImage($articleImage);
