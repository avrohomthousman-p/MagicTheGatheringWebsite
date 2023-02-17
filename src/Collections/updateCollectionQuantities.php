<?php

include '../databaseLoginData.php';



function updateDatabase($connection, $quantity, $cardname){
    //query to add the cards to the collection
    $query = <<< TEXT
        UPDATE OwnedBy
        SET Quantity = Quantity + {$quantity}, Availible = Availible + {$quantity}
        WHERE UserID = {$_SESSION['userID']} AND Cardname = '{$cardname}';
TEXT;
        
    $connection->query($query);
}


//copy all the data to a new array, but remove all cardnames that dont
//require any changes.
function cleanPostArray(){ 
    $cardData = array();
    foreach($_POST as $key => $value){
        if($value == 0){
            continue;
        }
    
        
        $cardData[$key] = $value;
    }
    
    return $cardData;
}






session_start();
$connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));


$changes = cleanPostArray();



//Make the change to the database
foreach ($changes as $key => $value) {
    updateDatabase($connection, $value, $key);
}


//Now remove any entries of cards whose quantity is zero
$query = <<< TEXT
        DELETE FROM OwnedBy 
        WHERE UserID = {$_SESSION['userID']}
        AND Quantity = 0;
TEXT;
        
$connection->query($query);
        
        
        