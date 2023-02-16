<?php

function displayCard($source, $quantity, $name){
    
    $card = <<< TEXT
            
            <div class="cardSection card col-md-3 text-center">
            
                <div class="d-inline">
                    <img src="{$source}" alt="image not found..." >
                </div>
            
                <div class="d-inline">
                    <button type="button" class="plus"><img src="images/plus.jpg" alt="plus" ></button>
                    <span id="{$name}" class="quantity">{$quantity}</span>
                    <button type="button" class="minus"><img src="images/minus.jpg" alt="minus" ></button>
                </div>
            
            </div>
            
            
TEXT;
    
    return $card;
}



function displayCardInCollection($source, $quantity, $availible, $name){
        $card = <<< TEXT
            
            <div class="cardSection card col-md-3 text-center">
            
                <div class="d-inline">
                    <img src="{$source}" alt="image not found..." >
                </div>
            
                <div class="d-inline">
                    <div>
                    <p>Owned:</p>
                    <button type="button" class="plus"><img src="images/plus.jpg" alt="plus" ></button>
                    <span id="{$name}" class="quantity">{$quantity}</span>
                    <button type="button" class="minus"><img src="images/minus.jpg" alt="minus" ></button>
                    </div>
                    
                    <div class="availible">Availible: {$availible}</div>
                </div>
            
            </div>
            
            
TEXT;
    
    return $card;
}


 
function getFormToAddCard(){
    $form = <<< TEXT
            
            
    <div id="formToAddCard">
        <h3>Add a Card to Your Deck</h3>
        <label for="cardName">Card Name</label>
        <input type="text" class="form-control" id="cardName" placeholder="Card Name">
        <span id="cardNameError" class="text-danger d-block">&nbsp</span>
        <label for="amount">Quantity: </label>
        <input type="number" class="form-control" id="amount" placeholder="1" min="1">
        <span id="amountError" class="text-danger">&nbsp</span>
        <div>
        <label for="addToCollection" class="small d-inline">
            Would you like this card added to your collection too?
            (if you do not have enough copies availible)
        </label>
        <input type="checkbox" id="addToCollection" checked="checked">
        </div>
        <input type="button" class="btn btn-primary" id="addCardButton" value="Add Maindeck">
        <input type="button" class="btn btn-primary" id="addCommanderButton" value="Add As Commander">
        <span id="insufficentCopies" class="text-danger d-block">&nbsp</span>
    </div>
            
            
TEXT;
    
    
    return $form;
}



function getFormToAddCardToCollection(){
    $form = <<< TEXT
            
            
    <div id="formToAddCard">
        <h3>Add a Card to Your Collection</h3>
        <label for="cardName">Card Name</label>
        <input type="text" class="form-control" id="cardName" placeholder="Card Name">
        <span id="cardNameError" class="text-danger d-block">&nbsp</span>
        <label for="amount">Quantity: </label>
        <input type="number" class="form-control" id="amount" placeholder="1" min="1">
        <span id="amountError" class="text-danger">&nbsp</span>
        
        <div class="text-center">
        <input type="button" class="btn btn-primary" id="addCardButton" value="Add To Collection">
        </div>
        <span id="serverError" class="text-danger d-block">&nbsp</span>
    </div>
            
            
TEXT;
    
    
    return $form;
}




