<?php

function createNewDeckForm($errorMsg = "&nbsp"){
    $head = createHead("New Deck", array(
        "<link href=\"createNewDeck.css\" rel=\"stylesheet\" type=\"text/css\" />",
        "<script src=\"createNewDeck.js\"></script>"));
    
    $form = <<< TEXT
        <div>
        <form method="POST" action="displayDeck.php">
            <h1>Please Give Us Some Information On Your New Deck</h1>
            <label for"deckName">Deck Name:</label>
            <input id="deckName" class="form-control" name="deckName" type="text" class="form-control" placholder="Deck Name">
            <span id="error" class="text-danger d-block">{$errorMsg}</span>
        
            <label for="deckFormat">Deck Format:</label>
            <select id="deckFormat" class="form-control" name="deckFormat">
                <option value="standard">Standard</option>
                <option value="commander">Commander</option>
                <option value="modern">Modern</option>
                <option value="brawl">Brawl</option>
                <option value="pauper">Pauper</option>
                <option value="vintage">Vintage</option>
                <option value="legacy">Legacy</option>
            </select>
        
            <div class="text-center">
            <button id="submitNewDeck" type="submit" class="btn btn-primary" name="deck" value="-1">Create Deck</button>
            </div>
        </form>
        </div>
TEXT;
    
    
    return $head . $form . createFooter();
}

function createCommandersSection($commanders){
    $section = "<div id=\"addCards\" class=\"row\">";
    while($row = $commanders->fetch_assoc()){
        $section = $section . "<img src=\"{$row['PicUrl']}\" >";
    }
    
    $section = $section . getFormToAddCard() . "</div>";
    return $section;
}







    include '../header.php';
    include '../displayCard.php';
    include '../DatabaseQueries.php';
    include '../footer.php';
    
    
    session_start();
    if(!isset($_POST['deck'])){
        echo(createHead("Error", array()));
        
        echo("<h1>Something went wrong and we are unable to find your deck."
                . " Try <a href=\"loginPage.php\">logging in</a> again.</h1>");
        
        echo(createFooter());
        exit();
    }
    
    
    //if we are creating a new deck
    if($_POST['deck'] == -1){
        if(isset($_POST['deckName'])){
            //check if that name is taken
            if(isDeckNameAvailible($_POST['deckName'])){
                //create deck, get its ID, and continue with the script
                $_SESSION['deckID'] = createNewDeck($_POST['deckName'], $_POST['deckFormat']);
            }
            else{
                //output the form again with an error msg
                echo(createNewDeckForm("That name is taken"));
                exit();
            }
        }
        else{
            echo(createNewDeckForm());
            exit();
        }
    }
    //if we are accsessing an existing deck
    else{
        $_SESSION['deckID'] = $_POST['deck'];
    }
    
    
    
    $name = loadDeckName($_SESSION['deckID']);
    echo(createHead("Manage Your collection-{$name}", array(
        "<link href=\"../displayCard.css\" rel=\"stylesheet\" type=\"text/css\" />",
        "<script src=\"editDeck.js\"></script>"
    )));
    
    
    echo(createCommandersSection(loadDeckCommanders($_SESSION['deckID'])));
    
    
    $cards = loadDeckContents($_SESSION['deckID']);
    
    
    echo("<div class=\"row\" id=\"mainDeckContents\">");
    //display cards in the deck
    while($row = $cards->fetch_assoc()){
        echo(displayCard($row['PicUrl'], $row['Quantity'], $row['Name']));
    }
    

    echo("</div></div>");
    
    
    
    
    echo("<div class=\"text-center\"><button type=\"button\" id=\"saveChanges\" class=\"btn btn-primary\">Save Changes</button></div>");
    
    echo(createFooter());
