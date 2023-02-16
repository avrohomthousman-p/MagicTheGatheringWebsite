"use strict";

function $(id){
    return document.getElementById(id);
}

function isEmpty(userEntry){
    return userEntry === null || userEntry === "";
}

function isLetterOrWhitespace(str) {
    return str.length === 1 && str.match("[a-zA-Z]|\\s+");
}


function isValidSubTypes(userEntry){
    if(isEmpty(userEntry)){
        return false;
    }
    
    for(var i = 0; i < userEntry.length; i++){
        if(!isLetterOrWhitespace(userEntry[i])){
            return false;
        }
    }
    
    return true;
}


function isValidManaCost(userEntry){
    if(isEmpty(userEntry)){
        return false;
    }
    
    
    for(var i = 0; i < userEntry.length; i++){
        if(!userEntry[i].match("[WUBRGXwubrgx0-9]")){
            return false;
        }
    }
    
    return true;
}

function uploadCard(){
    var allValid = true;
    
    
    //is the card name valid
    if(isEmpty($("cardName").firstChild.nodeValue)){
        allValid = false;
        $("cardNameError").firstChild.nodeValue = "invalid card name";
    }
    else{
        $("cardNameError").firstChild.nodeValue = " ";
    }
    
    
    //are the sub types valid
    if(!isValidSubTypes($("cardSubTypes").firstChild.nodeValue)){
        allValid = false;
        $("cardTypesError").firstChild.nodeValue = "invalid card sub-type";
    }
    else{
        $("cardTypesError").firstChild.nodeValue = " ";
    }
    
    
    if(!isValidManaCost($("manaCost").firstChild.nodeValue)){//is the mana cost valid
        allValid = false;
        $("manaCostError").firstChild.nodeValue = "invalid mana cost";
    }
    else{
        $("manaCostError").firstChild.nodeValue = " ";
    }
    
    
    if(allValid){
        //TODO submit to server
    }
}


window.onload = function(){
    $("upload").onclick = uploadCard;
    //TODO
    
};

