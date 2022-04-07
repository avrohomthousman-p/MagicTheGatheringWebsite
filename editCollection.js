const deckChanges = new Map();



function add(){
    var owned = this.nextElementSibling;
    var availible = this.parentNode.nextElementSibling;
    
    var currentValue = parseInt(owned.firstChild.nodeValue);
    owned.firstChild.nodeValue = currentValue + 1;
    
    currentValue = parseInt(availible.firstChild.nodeValue.substring(11));
    availible.firstChild.nodeValue = "Availible: " + (currentValue + 1);
    
    //now update the deckChanges map
    var key = $(this).next().attr("id");
    deckChanges.set(key, deckChanges.get(key) + 1);
}


function subtract(){
    var owned = this.previousElementSibling;
    var availible = this.parentNode.nextElementSibling;
    
    
    var currentValue = parseInt(availible.firstChild.nodeValue.substring(11));
    if(currentValue === 0){
        return; //don't subrtact 1 becuase that makes it negative
    }
    
    availible.firstChild.nodeValue = "Availible: " + (currentValue - 1);
    
    currentValue = parseInt(owned.firstChild.nodeValue);
    owned.firstChild.nodeValue = currentValue - 1;
    
    
    //now update the deckChanges map
    var key = $(this).prev().attr("id");
    deckChanges.set(key, deckChanges.get(key) - 1);
}


function addCard(isCommander){
    if(!formIsValid()){
        return;
    }
    
   
    $.post("addCardToCollection.php", 
            {cardname : $("input#cardName").val(), quantity : parseInt(($("input#amount").val()))},
            function(data){
                if(data == "Error: that card is already in the collection"){
                    $("span#serverError").text("That card is already in your collection.");
                }
                else{
                    $("div#formToAddCard")[0].insertAdjacentHTML('beforebegin', data);
                    
                    //add action listeners for the plus and minus buttons for the new card
                    $("button.plus").last().click(add);
                    $("button.minus").last().click(subtract);
                }
            });
}



function formIsValid(){
    var allValid = true;
    
    if($("input#cardName").val() == ""){
        $("span#cardNameError").text("This feild is required");
        allValid = false;
    }
    else{
        $("span#cardNameError").text("");
    }
    
    
    
    if($("input#amount").val() === ""){
        $("span#amountError").text("This feild is required");
        allValid = false;
    }
    else{
        $("span#amountError").text("");
    }
    
    return allValid;
}


function saveChanges(){
    if(noChangesMade()){
        return;//no need to ask the server to change anything
    }
    
    
    var postData = Object.fromEntries(deckChanges);

    $.post("updateCollectionQuantities.php", postData, function(data){
        resetDeckChanges();
    });

}



//resets the span element that tells you how many copies of the specified card you have.
function resetNumbersOfCards(id, decrementBy){
    var element = $("span#"+id);
    element.text(parseInt(element.text()) - decrementBy);
}



//resets all entries in the deckChanges map to zero
function resetDeckChanges(){
    deckChanges.clear();
    
    $("div#mainContents span.quantity").each(function(){
        deckChanges.set($(this).attr("id"), 0);
    });
}



//Checks to see if there are unsaved changes to the collection
function noChangesMade(){
    var iter = deckChanges.values();
    
    var result = iter.next();
    while(!result.done){
        if(result.value !== 0){
            return false;
        }
        result = iter.next();
    }

    return true;
}



$(window).bind('beforeunload', function(){
    if(!noChangesMade()){
        return 'Are you sure you want to exit? There are unsaved changes to' 
            + ' your collection. Consider going back and clicking the "Save Changes" button.';
    }
});




$(document).ready(function(){
    //give all the plus buttons an action listener
    var elements = document.getElementsByClassName("plus");
    for(var i = 0; i < elements.length; i++){
        elements[i].onclick = add;
    }
    
    //give all the minus buttons an action listener
    var elements = document.getElementsByClassName("minus");
    for(var i = 0; i < elements.length; i++){
        elements[i].onclick = subtract;
    }
    
    //setup action listeners for the buttons to add a card/commander to the deck
    $("input#addCardButton").click(function(){
        addCard(false);
    });
    
    resetDeckChanges();
    
    
    $("button#saveChanges").click(saveChanges);
});




