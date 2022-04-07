$(document).ready(function(evt){
    $("button#submitNewDeck").click(function(){
        if($("input#deckName").val() == ""){
            $("span#error").text("This feild is required");
            return false;
        }
        else{
            return true;
        }
    });
});

