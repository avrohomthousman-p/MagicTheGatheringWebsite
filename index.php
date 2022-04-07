<?php
function getCarousel($side){
    $carousel = <<< TEXT

    <div id="slideShow{$side}" class="text-center col-md-3">
        <img src="images/white.jpg" alt="mana symbol">
    </div>
        
TEXT;
    
    return $carousel;
}






include 'header.php';
include 'footer.php';

echo(createHead("Manage Your Collection-Home", array(
                "<link href=\"homePageStyles.css\" rel=\"stylesheet\" type=\"text/css\" />",
                "<script src=\"runSlideShow.js\"></script>")));




echo("<div class=\"row\">");
echo(getCarousel("Left"));


$content = <<< TEXT
        <div class="col-md-1"></div>
        <div class="col-md-4" id="content">
            <p>This is a website to help you manage your collection of Magic cards.
            If you have many decks and need some way of keeping track of what cards
            are where, this website is for you. Create an account or sign in to an 
            existing account by filling in the form on our login page, or by 
            <a href="loginPage.php">clicking here</a>. Then you can use the 
            navigation bar above to acsess any of our pages or begin by adding
            cards to your collection and build decks with those cards.
            We can't wait to have you join!</p>
        </div>
        <div class="col-md-1"></div>
TEXT;

echo($content);


echo(getCarousel("Right"));

echo("</div>");




//place an accordian here
$content = <<< TEXT
<div class="row">     
<div class="col-md-4"></div>
    
<div class="text-center col-md-4" id="extras">
    <h1>Here are some free deck ideas.</h1>
        
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Atraxa Praetors' Voice
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a href="https://edhrec.com/cards/atraxa-praetors-voice" target="_blank">
                Atraxa Praetors' Voice</a> is a creature that proliferates on each of your end
                steps. You can use this ability in a planswalkers deck, slowly building towards
                high powered ultimates. Alternativly you can play infect. Put poison counters
                on your opponenets and proliferate them to death.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Wilhelt, the Rotcleaver
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a href="https://edhrec.com/cards/wilhelt-the-rotcleaver" target="_blank">
                Wilhelt, the Rotcleaver</a> is a zombie creature that lets you sacrifice 
                another zombie on your end step to draw a card. It also gives you another free
                zombie with decayed every time one of your other zombies without decayed dies. 
                This makes an exiting Dimir zombie deck that can be focused on sacrificing your
                own creatures or on amassing a huge army of zombies.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Muldrotha, the Gravetide
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <a href="https://edhrec.com/cards/muldrotha-the-gravetide" 
                target="_blank">Muldrotha, the Gravetide</a> is a creature that 
                lets you play one of each permanent type from your graveyard on
                each turn. This makes for excellent recursion. You can gain immense 
                value by casting cards from your graveyard every turn. You can also 
                have a substrategy of self mill, sacrifice, or enter the battlefeild 
                triggers.
            </div>
        </div>
    </div>
</div>
        
</div>
        
<div class="col-md-4"></div> 
</div>    
        
TEXT;

echo($content);



echo(createFooter());