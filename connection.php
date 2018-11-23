<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "file_handling";

$connectionObject = new mysqli($servername, $username, $password, $database);

if ($connectionObject->connect_error) {
    die("Connection failed :" . $connectionObject->connect_error);
}

echo "Connection successfully created <br>";
