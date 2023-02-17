const deckChanges = new Map();



function add(){
    var currentValue = parseInt(this.nextElementSibling.firstChild.nodeValue);
    this.nextElementSibling.firstChild.nodeValue = currentValue + 1;
    
    //now update the deckChanges map
    var key = $(this).next().attr("id");
    deckChanges.set(key, deckChanges.get(key) + 1);
}


function subtract(){
    var currentValue = parseInt(this.previousElementSibling.firstChild.nodeValue);
    if(currentValue === 0){
        return; //don't subrtact 1 becuase that makes it negative
    }
    this.previousElementSibling.firstChild.nodeValue = currentValue - 1;
    
    //now update the deckChanges map
    var key = $(this).prev().attr("id");
    deckChanges.set(key, deckChanges.get(key) - 1);
}


function addCard(isCommander){
    if(!formIsValid()){
        return;
    }
    
    
    $.post("addCardToDeck.php", 
            {cardname : $("input#cardName").val(), quantityNeeded : parseInt(($("input#amount").val())),
            addToCollection : $("input#addToCollection").prop("checked"), isCommander : isCommander },
            function(data){
                if(data.startsWith("Error: ")){
                    $("span#insufficentCopies").text(data);
                }
                else{
                    //output the new HTML
                    if(isCommander){
                        $("div#addCards")[0].insertAdjacentHTML("afterbegin", data);
                    }
                    else{
                        $("div#mainDeckContents").children().last()[0].insertAdjacentHTML("afterend", data);
                        
                        //add action listeners for the plus and minus buttons for the new card
                        $("button.plus").last().click(add);
                        $("button.minus").last().click(subtract);
                    }
                    
                    $("span#insufficentCopies").text(" ");
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
    $.post("updateDeckQuantities.php", postData, function(data){
        if(data.startsWith("Warning")){
            
            if(confirm(data)){
                postData.addWherePossible = "true";
                $.post("updateDeck.php", postData, function(data){
                    var needReset = data.split(/ : /);
                    needReset.forEach(function(item){
                        resetNumbersOfCards(item, deckChanges.get(item));
                    });
                    resetDeckChanges();
                });
            }
            else{
                //undo all the changes
                deckChanges.forEach((value, key) => {
                    resetNumbersOfCards(key, value);
                });
                
                resetDeckChanges();
            }

        }
        else{
            resetDeckChanges();
        }
        
    });
}



//resets all entries in the deckChanges map to zero
function resetDeckChanges(){
    deckChanges.clear();
    
    $("div#mainDeckContents span.quantity").each(function(){
        deckChanges.set($(this).attr("id"), 0);
    });
}



//resets the span element that tells you how many copies of the specified card you have.
function resetNumbersOfCards(id, decrementBy){
    var element = $("span#"+id);
    element.text(parseInt(element.text()) - decrementBy);
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
            + ' your Deck. Consider going back and clicking the "Save Changes" button.';
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
    $("input#addCommanderButton").click(function(){
        addCard(true);
    });
    
    resetDeckChanges();
    
    $("button#saveChanges").click(saveChanges);

});

