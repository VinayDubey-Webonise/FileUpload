<?php
include ('connection.php');

$query = "select title, image_path, document from file_table";

$resultArray = $connectionObject->query($query);
if (!$resultArray) {
    trigger_error('Invalid query: ' . $connectionObject->error);
}
if ($resultArray->num_rows != NULL) {
    echo "<table border='1'><tr><th>Title</th><th>Image</th><th>Document</th></tr>";
    
    // output data of each row
    while($row = $resultArray->fetch_assoc()) {
        echo "<tr><td>".$row['title']."</td><td><img src='".$row['image_path']."' width='300px'></td><td>".$row['document']."</td></tr>";
    }
    echo "</table>";
}
else {
    echo "<h3>No data to display.<h3>";
}
$connectionObject->close();
?>