<?php

include 'databaseLoginData.php';


//checks if the user has enough copies of a card to add it to the deck
function hasSufficentCopies($connection, $amountNeeded, $cardname){
    $query = <<< TEXT
        SELECT * FROM OwnedBy
        WHERE {$_SESSION['userID']} = UserID 
            AND '{$cardname}' = Cardname 
            AND {$amountNeeded} <= Availible;
TEXT;
        
    return (($connection->query($query))->num_rows) === 1;
}


//checks if the user has enough copies of each card, and generates an error message
//based on the results.
function generateErrorMsg($cardData, $connection){
    $error = "";
    foreach($cardData as $key => $value){
        if($value > 0){
            if(!hasSufficentCopies($connection, $value, $key)){
                $error = $error . "\n{$key}";
            }
        }
    }
    
    if($error !== ""){
        $error = "Warning: this action cannot be completed because you do not have "
                 . "sufficent copies of these cards: " . $error . "\nClick \"ok\" if you" 
                 . " would like to contine and add the remaining cards to the deck, or "
                 . "click \"cancel\" to discard all changes.";
    }
    
    return $error;
}



function addCardsToDeck($connection, $key, $value){
    
    $query = "UPDATE OwnedBy SET Availible = Availible - {$value} "
            . "WHERE UserID = {$_SESSION['userID']} AND Cardname = '{$key}';";
            
    
    $connection->query($query);
            
    $query = "UPDATE InDeck SET Quantity = Quantity + {$value} "
            . "WHERE DeckID = {$_SESSION['deckID']} AND Cardname = '{$key}';";
            
            
    $connection->query($query);
}



//copy all the data to a new array, but remove all cardnames that dont
//require any changes
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


//if the user removes all copies of a card from the deck the InDeck table will
//still have an entry for that card with a quantity of 0. The card will therefore
//be displayed when the deck is loaded. To prevent this, this function deletes all
//such entries in the database.
function removeCardsWithNoCopies($connection){
    $query = <<< TEXT
            DELETE FROM InDeck WHERE DeckID = {$_SESSION['deckID']} AND Quantity = 0;
TEXT;
    
    $connection->query($query);
}





session_start();
$connection = new mysqli("localhost", "root",  getDatabasePassword(), "CardCollections");

 
$cardData = cleanPostArray();


//check if we are told to add only where possible
if(isset($cardData['addWherePossible'])){
    unset($cardData['addWherePossible']);
    
    $results = array();//represents a list of all cards that were NOT added to the deck due to insufficent copies
    
    //update the database only when the user has enough cards
    foreach($cardData as $key => $value){
        if(hasSufficentCopies($connection, $value, $key)){
            addCardsToDeck($connection, $key, $value);
        }
        else{
            array_push($results, $key);
        }
    }
    removeCardsWithNoCopies($connection);
    
    echo(implode(" : ", $results));
    exit();
}




//check if the user has enough copies of each card
$error = generateErrorMsg($cardData, $connection);

if($error !== ""){  //if there is something wrong
    echo($error);   //display the error
    exit();         //and leave the script
}



//update the database
foreach($cardData as $key => $value){
    addCardsToDeck($connection, $key, $value);
}

removeCardsWithNoCopies($connection);

