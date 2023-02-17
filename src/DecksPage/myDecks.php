<?php
function createDeckSection($deckName, $deckID){
    $section = <<< TEXT
        <div class="deckDisplay">
            <form method="POST" action="displayDeck.php">
                <h3>{$deckName}</h3>
                <br>
                <button type="submit" name="deck" value="{$deckID}" class="btn btn-primary">
                    Click To Edit
                </button>
            </form>
                            
        </div>
TEXT;
                
    return $section;
}






include '../header.php';
include '../DatabaseQueries.php';
include '../footer.php';

echo(createHead("Manage Your Collection-My Decks", 
        array("<link href=\"deckSection.css\" rel=\"stylesheet\" type=\"text/css\" />",
            "<link href=\"myDecks.css\" rel=\"stylesheet\" type=\"text/css\" />")));



session_start();
if(!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false;
}


if(!$_SESSION['loggedIn']){
    echo("<h1 class=\"text-center\">Please <a href=\"loginPage.php\">Log in</a> to access your decks</h1>");
    echo(createFooter());
    exit();
}






echo("<h1>Here Are All Your Deck's</h1>");



$decks = loadAllDecks($_SESSION['userID']);

while($row = $decks->fetch_assoc()){
    echo createDeckSection($row['Deckname'], $row['DeckID']);
}

//create section to make new deck
    $section = <<< TEXT
        <div class="deckDisplay">
            <form method="POST" action="displayDeck.php">
                <h3>Create New Deck</h3>
                <br>
                <button type="submit" name="deck" value="-1" class="btn btn-primary">
                    Click To Create
                </button>
            </form>
                            
        </div>
TEXT;
                
echo($section);




//sample data for testing the page  
/* 
for($i = 0; $i < 10; $i++){
    echo createDeckSection("mizzex", $i);
}
 */


echo("<div id=\"end-floating\"></div>");
echo(createFooter());

