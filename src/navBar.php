<?php

function createNavBar(){
    $navBar = <<< TEXT

   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../images/logo.jpg" alt="logo" id="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../LoginPage/loginPage.php">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../HomePage/index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../CollectionPage/displayCollection.php">My Collection </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../DecksPage/myDecks.php">My Decks </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../DeckAnalysis/emptyPage.php">Deck Analysis </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../CardOfTheDayPage/cardOfTheDay.php">Card Of The Day </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../CardLookupPage/lookUpCard.php">Look Up Cards </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../ContactUsPage/contactUs.php">Contact Us </a>
            </li>
        </ul>
    </div>
</nav>
                
                
                
TEXT;
                
    return $navBar;
}

