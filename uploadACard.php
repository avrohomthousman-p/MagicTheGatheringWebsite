<?php
    include 'header.php';
    include 'footer.php';
    
    echo(createHead("Manage Your Collection-Upload a Card", array(
        "<link href=\"uploadingCards.css\" rel=\"stylesheet\" type=\"text/css\" /> ",
        "<script src=\"errorCheckCardUpload.js\"></script>"
    )));
    $body = <<< TEXT

<form class="needs-validation">
            
            
    
            
    <div class="row">
            <div class="col">
            
            
                <div class="form-group-row">
                    <label for="cardName">Card Name: </label>
                    <input type="text" class="form-control" id="cardName" placeholder="Card Name">
                    <span id="cardNameError">&nbsp </span>
                </div>            
            
                <div>
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example">
                        <option selected> Select Card Type </option>
                        <option>Creature</option>
                        <option>Artifact</option>
                        <option>Enchantment</option>
                        <option>Enchantment Creature</option>
                        <option>Artifact Creature</option>
                        <option>Planeswalker</option>
                        <option>Land</option>
                        <option>Instant</option>
                        <option>Sorcery</option>
                    </select>
                </div>
            
            
            </div>
            
            <div class="col">
            
                <div class="form-group-row">
                    <label for="cardSubTypes">Card Sub Types: </label>
                    <input type="text" class="form-control" id="cardSubTypes" placeholder="Zombie, Snow">
                    <span id="cardTypesError">&nbsp</span>
                </div> 

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Legendary
                    </label>
                </div>
            
            
            </div>
    </div>
            
            
            
    <div class="row">
            
            
            
            <div class="col">
                <div id="manaCostDiv">
                    <input type="text" id="manaCost" class="form-control" placeholder="mana cost">
            
                    <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#explenation" aria-expanded="false" aria-controls="explenation" >
                    How To Enter a Mana Cost </button>
            
                    <div class="collapse" id="explenation" >
                        <div class="container" id="innerContainer">
                            <p>To enter the mana cost of a card, use these codes: <br>
                            W = White <br>
                            U = Blue <br>
                            B = Black <br>
                            R = Red <br>
                            G = Green <br>
                            X = x generic mana <br>
                            Any number = that much generic mana
                            </p>
                        </div>
                    </div>
                    <span id="manaCostError">&nbsp</span>
                </div>
            </div>
            
            
            
            <div class="col">
                <div class="form-group-row">
                    <label for="amountAddedToCollection">How Many Would You Like To Add To Your Collection? </label>
                    <input type="number" class="form-control" id="amountAddedToCollection" placeholder="0" min="0" max="10">
                </div> 
            </div>
            
            
                
    </div>
    
            
    <div class="row d-flex justify-content-center flex-nowrap">
        <button type="button" id="upload" class="btn btn-primary">Upload</button>
    </div>
            
            
</form>
            
TEXT;
    
    echo($body);
    echo(createFooter());
?>