<?php


include 'databaseLoginData.php';


function login($username, $password){
    $username = htmlentities($username);
    $password = htmlentities($password);
    
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $results = $connection->query("SELECT * FROM Users WHERE Username = '{$username}';");
    $connection->close();
    
    if($results->num_rows === 0){
        return "Username not found";
    }
    else if($results->num_rows === 1){
        $data = $results->fetch_assoc();
        if($password === $data['Password']){
            return $data['UserID'];
        }
        else{
            return "Incorrect password";
        }
    }
}


function createAccount($username, $password){
    $username = htmlentities($username);
    $password = htmlentities($password);
    
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $query = <<< TEXT
            SELECT
            CASE
                WHEN EXISTS (SELECT Username FROM Users WHERE Username = '{$username}') 
                THEN 'Taken'
                ELSE 'Availible'
                
                END AS Availibility;
TEXT;
    
    $results = ($connection->query($query))->fetch_assoc();
    
    if($results['Availibility'] === "Availible"){
        $connection->query("INSERT INTO Users (Username, Password) VALUES ('{$username}', '{$password}');");
        $results = ($connection->query("SELECT LAST_INSERT_ID() AS Availibility;"))->fetch_assoc();
    }
    
    $connection->close();
    
    
    return $results['Availibility'];
}



function loadAllDecks($userID){
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $results = $connection->query("SELECT DeckID, Deckname FROM Decks WHERE UserID = '{$userID}';");
    $connection->close();
    
    return $results;
}


function loadDeckName($deckID){
    $deckID = (int)$deckID;
    
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $results = $connection->query("SELECT Deckname FROM Decks WHERE DeckID = {$deckID};");
    $connection->close();
    
    return $results->fetch_assoc()['Deckname'];
    
}


function loadDeckCommanders($deckID){
    $deckID = (int)$deckID;
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $query = <<< TEXT
            SELECT PicUrl
            FROM InDeck JOIN Cards 
            ON Cardname = Name
            WHERE DeckID = {$deckID} AND IsCommander = 1;
TEXT;
    
    $results = $connection->query($query);
    $connection->close();
    
    return $results;
}



function loadDeckContents($deckID){
    $deckID = (int)$deckID;
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $query = <<< TEXT
            SELECT PicUrl, Name, Quantity
            FROM InDeck JOIN Cards 
            ON Cardname = Name
            WHERE DeckID = {$deckID} AND IsCommander = 0
            ORDER BY Cardname;
TEXT;
    
    $results = $connection->query($query);
    $connection->close();
    
    return $results;
}

//unused
function hasSufficentAvailibleCards($cardname, $quantityNeeded){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $cardname = str_replace("'", "''", $cardname);//escape all apostrophies
    $result = $connection->query("SELECT Availible FROM OwnedBY WHERE UserID = "
            . "'{$_SESSION['userID']}' AND Cardname = '{$cardname}';");
    
    if($result->num_rows === 0){//if the user has zero copies of this card
        return false;
    }
    
    $result = $result->fetch_assoc();
    return $result[Availible] >= $quantityNeeded;
}



function createNewDeck($deckname, $format){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    $connection->query("INSERT INTO Decks (Deckname, Format, UserID) VALUES ('{$deckname}', '{$format}', {$_SESSION['userID']});");
    
    $deckID = $connection->query("SELECT MAX(DeckID) AS deckID FROM Decks;");
    $connection->close();
    
    return ($deckID->fetch_assoc())['deckID']; //return the deck ID of the deck just created
}


function isDeckNameAvailible($deckName){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $connection = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DBname"));
    
    
    $query = <<< TEXT
            SELECT COUNT(*) AS count FROM Decks
            WHERE DeckName = '{$deckName}' AND UserID = {$_SESSION['userID']};
TEXT;
    
            
            
    $result = $connection->query($query)->fetch_assoc()['count'];
    
    return $result == 0;
}




function test_login(){
    echo(login("yochonon", "mypass12"));
    echo("<br>");
    echo(login("yochonon", "notcorrect"));
    echo("<br>");
    echo(login("doesnt exist", "mypass12"));
}


function test_create_account(){
    echo(createAccount("mr_kid_jr", "mypass12"));
    echo("<br>");
    echo(createAccount("yochonon", "mypass12"));
}


