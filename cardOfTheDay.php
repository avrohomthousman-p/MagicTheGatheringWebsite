<?php
function printCard($url){
    $text = <<< TEXT
            <div class="text-center">
                <h2>Today's Card Is: </h2>
                <img src="{$url}" alt="card of the day">
            </div>
TEXT;
    
    return $text;
}




include 'header.php';
include 'connectToScryfall.php';
include 'footer.php';


echo(createHead("Manage Your Collection-Home", array()));





$connection = new mysqli("localhost", "root",  "INSERT PASSWORD", "CardCollections");


//query to check if the card we have has been updated for today
$query = <<< TEXT
        SELECT 
            CASE
                WHEN LastUpdated = CURDATE() THEN PicUrl
                ELSE 'need new card'
            END
                AS url
        FROM CardOfTheDay
        JOIN Cards ON Name = Cardname;
TEXT;

$result = $connection->query($query)->fetch_assoc();



if($result['url'] === "need new card"){
    $card = getRandomCard();
    
    
    if($card['object'] == "error"){
        echo("<div class=\"text-center\"><h1>Unable to Connect to Scryfall. Please Check Back Later.</h1></div>");
        exit();
    }
    
    
    //query to add the card to the cards table of the database if it isnt already there
    $query = <<< TEXT
        INSERT IGNORE INTO Cards (Name, PicUrl)
        VALUES ('{$card['cardname']}', '{$card['picUrl']}');
TEXT;

    $connection->query($query);
    
    
    //Query to update the CardOfTheDay feild to have todays date and the new card
    $query = <<< TEXT
            UPDATE CardOfTheDay
            SET Cardname = '{$card['cardname']}', LastUpdated = CURDATE();
TEXT;
            
    $connection->query($query);
    
    
    
    echo(printCard($card['picUrl'])); 
}
else{
    echo(printCard($result['url']));
}





echo(createFooter());

$connection->close();
