<?php

include 'databaseLoginData.php';
include 'connectToScryfall.php';
include 'displayCard.php';


session_start();
    
$connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));



//use the methods from the connectToScryfall.php file to get the card's name
//(formatted correctly) and the url for the card image
$data = requestCardData($_POST['cardname']);

//check if scryfall found the card
if($data['object'] == 'error'){
    echo("Error: ");
    echo($data['details']);
    exit();
}

$_POST['cardname'] = $data['cardname'];
$_POST['imgUrl'] = $data['picUrl'];




//add the card to Cards table if it isnt already there  
$query = <<< TEXT
        INSERT IGNORE INTO Cards (Name, PicUrl)
        VALUES ('{$_POST['cardname']}', '{$_POST['imgUrl']}');
TEXT;

$connection->query($query);




//if the user is trying to add a card that is already in the deck, dont allow it
$query = <<< TEXT
        SELECT * FROM OwnedBy
        WHERE UserID = {$_SESSION['userID']} 
        AND Cardname = '{$_POST['cardname']}';
TEXT;
        
if(($connection->query($query))->num_rows !== 0){
    $connection->close();
    echo("Error: that card is already in the collection");
    exit();
}



//query to add the card to the database.
$query = <<< TEXT
        INSERT INTO OwnedBy(Cardname, UserID, Quantity, Availible)
        VALUES ('{$_POST['cardname']}', {$_SESSION['userID']},
                {$_POST['quantity']}, {$_POST['quantity']});
TEXT;

$connection->query($query);


//now return the appropriate HTML
echo(displayCardInCollection($_POST['imgUrl'], $_POST['quantity'], $_POST['quantity'], $_POST['cardname']));

