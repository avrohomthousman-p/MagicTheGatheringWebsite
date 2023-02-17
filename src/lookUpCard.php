<?php
function getCardDataInHTML($cardData){
    $output = getCardDataFromDatabase($cardData['cardname']);
    
    $result = <<< TEXT
            <div class="row" id="cardData">
                <div class="col-md-3 offset-md-3" id="cardImg">
                    <img src="{$cardData['picUrl']}" alt="{$cardData['cardname']}">
                </div>
                <div class="col-md-3" id="data">
                    <h3>You Have:</h3>
                    <ul id="cardDataList">
                    {$output}
                    </ul>
                </div>
            </div>
TEXT;
    
    
    return $result;
}



function getCardDataFromDatabase($cardname){
    $cardQuantities = "";
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    
    //this query gets info about all decks that have the card in question
    $query = <<< TEXT
            SELECT Quantity, IsCommander, DeckName
            FROM InDeck JOIN Decks
            ON InDeck.DeckID = Decks.DeckID
            WHERE UserID = {$_SESSION['userID']}
            AND Cardname = '{$cardname}';
TEXT;
            
    //execute the query and iterate over the results
    $result = $connection->query($query);
    while($row = $result->fetch_assoc()){
        $cardQuantities .= "<li>{$row['Quantity']} " . (($row['Quantity'] == 1) ? "Copy" : "Copies")
            . (($row['IsCommander'] == 1) ? " as commander" : " maindeck") 
            . " in {$row['DeckName']}</li>";
    }
            
    
    
    //Gets the number of unused copies
    $query = <<< TEXT
            SELECT Availible FROM OwnedBy
            WHERE UserID = {$_SESSION['userID']}
            AND CardName = '{$cardname}';
TEXT;
    
    $result = $connection->query($query)->fetch_assoc();
    $cardQuantities .= "<li>Unused Copies: {$result['Availible']}</li>";
    
    
    return $cardQuantities;
}




include 'databaseLoginData.php';
include 'header.php';
include 'connectToScryfall.php';
include 'footer.php';

session_start();



if(!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false;
}

if(!$_SESSION['loggedIn']){
    echo(createHead("Manage Your Collection-Look Up A Card", array()));
    echo("<div class=\"text-center\">");
    echo("<h1>Please log in to access this page</h1>");
    echo("<p><a href=\"loginPage.php\">Click here</a> or use the navigation bar to log in.</p>");
    echo("</div>");
    echo(createFooter());
    exit();
}


echo(createHead("Manage Your Collection-Look Up A Card", array(
    "<link rel=\"stylesheet\" href=\"lookUpCard.css\" type=\"text/css\" >"
)));


//for testing only
//$_POST['cardname'] = "mizzex the izmagnus";

if(isset($_POST['cardname'])){
    $cardData = requestCardData($_POST['cardname']);
    $html = getCardDataInHTML($cardData);
}
else{
    $html = "";
}


$section = <<< TEXT
        <div class="text-center">
            <form method="POST" action="lookUpCard.php" class="mx-auto" id="lookUpCardForm">
                <h3>Enter One Of Your Cards To Get Information About Where You Are Using It</h3>
                <input type="text" id="cardName" placeholder="Card Name" name="cardname">
                <button class="btn btn-primary" id="submit">Get Card Information</button>
            </form>
            {$html}
        </div>
        
TEXT;

echo($section);

