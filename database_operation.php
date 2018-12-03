<?php
function storeInDatabase(){
    $insertQuery = 'insert into person(person_name) values(?)';
    $statement = $connectionObject->prepare($insertQuery); 
    $statement->bind_param('s', $personName);
    $statement->execute();
    
    $personName = 'Vijay';
    $statement->execute();
}

insertData();

$connectionObject->close();
