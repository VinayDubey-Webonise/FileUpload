<?php
include ('connection.php');
include ('field_validation.php');
include ('document_operation.php');

$articleTitle = $_POST['articleTitle'];
$articleImage = $_FILES['imageFile'];
$articleImageName = $articleImage['name'];
$articleDocument = $_FILES['documentFile'];
$articleDocumentName = $articleDocument['name'];

validateTitle($articleTitle);
validateImage($articleImage);
validateDocument($articleDocument);

$imageFilePath = "images/$articleImageName";
$documentFilePath = "documents/$articleDocumentName";

$appendText = 'Together we can change the world, just one random act of kindness at a time.';

// append new line to the already existing document
$docNewData = documentAppend($documentFilePath, $appendText);

// insert data into database
$insertQuery = 'insert into file_table(title, image_path, document_path, document) values(?,?,?,?)';
$statement = $connectionObject->prepare($insertQuery); 
$statement->bind_param('ssss', $articleTitle, $imageFilePath, $documentFilePath, $docNewData);
$statement->execute();

$statement->close();
$connectionObject->close();

header("location: show_data.php");
