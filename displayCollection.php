<?php
include 'header.php';
include 'displayCard.php';
include 'footer.php';

$connection = new mysqli("localhost", "root",  "INSERT PASSWORD", "CardCollections");

session_start();


if(!$_SESSION['loggedIn']){
    echo(createHead("Manage Your Colection-My Collection", array()));
    echo("<div class=\"text-center\">");
    echo("<h1>Please log in to access this page</h1>");
    echo("<p><a href=\"loginPage.php\">Click here</a> or use the navigation bar to log in.</p>");
    echo("</div>");
    echo(createFooter());
    exit();
}






echo(createHead("Manage Your Colection-My Collection", array(
    "<link href=\"displayCard.css\" rel=\"stylesheet\" type=\"text/css\" />",
    "<script src=\"editCollection.js\"></script>"
)));



echo("<div class=\"row\" id=\"mainContents\">");


$query = <<< TEXT
        SELECT PicUrl, Cardname, Availible, Quantity
        FROM Cards JOIN OwnedBy ON Cardname = Name
        WHERE UserID = {$_SESSION['userID']};
TEXT;

$results = $connection->query($query);

//display cards in the collection
while($row = $results->fetch_assoc()){
    echo(displayCardInCollection($row['PicUrl'], $row['Quantity'], $row['Availible'], $row['Cardname']));
}


echo(getFormToAddCardToCollection());

echo("</div>");

$submitButton = <<< TEXT
        <div class="text-center" id="submitBox">
            <button type="submit" class="btn btn-primary" id="saveChanges">Save Changes</button>
        </div>
TEXT;

echo($submitButton);

echo(createFooter());

