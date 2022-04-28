<?php

include 'connectToScryfall.php';
include 'displayCard.php';

session_start();
    
$connection = new mysqli("localhost", "root",  "INSERT PASSWORD", "CardCollections");



//some data gets altered when passed from the client. Here I fix that
$_POST['addToCollection'] = $_POST['addToCollection'] === "true";


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
        SELECT * FROM InDeck 
        WHERE DeckID = {$_SESSION['deckID']} 
        AND Cardname = '{$_POST['cardname']}';
TEXT;
        
if(($connection->query($query))->num_rows !== 0){
    $connection->close();
    echo("Error: that card is already in the deck");
    exit();
}




//now see if the user has enough spare copies of the card
$query = <<< TEXT
        SELECT {$_POST['quantityNeeded']} - Availible AS amountMissing
        FROM OwnedBy
        WHERE {$_SESSION['userID']} = UserID AND '{$_POST['cardname']}' = Cardname;
TEXT;

$result = $connection->query($query);



//if the collection has no copies of the card, 
if($result->num_rows === 0){     
    $amountMissing = $_POST['quantityNeeded'];
    
    //if we will be adding the card to the collection, we need to create an entry
    //in the OwnedBy table to store that card. here Quantity is initialized to 0
    //and later we will add the card by updating this entry.
    if($_POST['addToCollection']){
        $query = <<< TEXT
                INSERT INTO OwnedBy (Cardname, UserID, Quantity, Availible)
                VALUES ('{$_POST['cardname']}', {$_SESSION['userID']}, 0, 0);
TEXT;
                
        $connection->query($query);
    }
    
}
else{
    $amountMissing = (  $result->fetch_assoc()  )['amountMissing'];
}




//CREATE a query to insert the card into the deck (query is not run just yet)
$query = <<< TEXT
        INSERT INTO InDeck (DeckID, Cardname, IsCommander, Quantity)
        VALUES ({$_SESSION['deckID']}, '{$_POST['cardname']}', 
        {$_POST['isCommander']}, {$_POST['quantityNeeded']});
TEXT;



//add the card to the appropraite deck (and possibly collection also)
if($_POST['addToCollection'] && $amountMissing > 0){
    
    //query to modify the availible feild and the quantity feild of the collection
    $query2 = <<< TEXT
        UPDATE OwnedBy
        SET Availible = 0, Quantity = Quantity + {$amountMissing}
        WHERE UserID = {$_SESSION['userID']} AND Cardname = '{$_POST['cardname']}';
TEXT;
    
    $connection->query($query2);//add card to collection and set number of availible copies
    $connection->query($query);//add card to deck
    
    //output the new html
    if($_POST['isCommander'] === "true"){
        echo("<img src=\"{$_POST['imgUrl']}\" >");
    }
    else{
        echo(displayCard($_POST['imgUrl'], $_POST['quantityNeeded'], $_POST['cardname']));
    }
    
    
}
else if(!$_POST['addToCollection'] && $amountMissing > 0){
    echo("Error: insufficent copies");
}
else{
    
    //query to modify the availible feild
    $query2 = <<< TEXT
            UPDATE OwnedBy
            SET Availible = Availible - {$_POST['quantityNeeded']}
            WHERE UserID = {$_SESSION['userID']} AND Cardname = '{$_POST['cardname']}';
TEXT;
    
    $connection->query($query2);//adjust availible copies
    $connection->query($query);//add card to deck
    
    //output the new html
    if($_POST['isCommander'] === "true"){
        echo("<img src=\"{$_POST['imgUrl']}\" >");
    }
    else{
        echo(displayCard($_POST['imgUrl'], $_POST['quantityNeeded'], $_POST['cardname']));
    }
    
}



$connection->close();
