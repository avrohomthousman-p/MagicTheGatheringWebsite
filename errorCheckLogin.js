"use strict";

const illegalChars = [",", ";", ":", "\\", "+", "=", "/"];


function $(id){
    return document.getElementById(id);
}

function validateUserEntry(username, pass) {
    var validData = true;

    
    //error check username
    if(username == ""){
        $("usernameError").firstChild.nodeValue = "This feild is required.";
        validData = false;
    }
    else if(username.length < 7){
        $("usernameError").firstChild.nodeValue = "Username must be at least 7 characters.";
        validData = false;
    }
    else if(username.indexOf(" ") !== -1){
        $("usernameError").firstChild.nodeValue = "Username cannot contain spaces.";
        validData = false;
    }
    else if(containsIllegalChars(username)){
        $("usernameError").firstChild.nodeValue = "Username cannot contain special characters";
        validData = false;
    }
    else{
        $("usernameError").firstChild.nodeValue = " ";//if user fixed the problem, remove warning
    }
    
    
    
    //error check password
    if(pass == ""){
        $("passwordError").firstChild.nodeValue = "This feild is required.";
        validData = false;
    }
    else if(pass.length < 7){
        $("passwordError").firstChild.nodeValue = "Password must be at least 7 characters.";
        validData = false;
    }
    else if(pass.indexOf(" ") !== -1){
        $("passwordError").firstChild.nodeValue = "Password cannot contain spaces.";
        validData = false;
    }
    else if(containsIllegalChars(pass)){
        $("passwordError").firstChild.nodeValue = "Password cannot contain special characters";
        validData = false;
    }
    else{
        $("passwordError").firstChild.nodeValue = " ";
    }
    
    
    
    return validData;
}

function containsIllegalChars(text){
    for(var i = 0; i < text.length; i++){
        for(var j = 0; j < illegalChars.length; j++){
            if(text[i] === illegalChars[j]){
                return true;
            }
        }
    }
    return false;
}

function login(){
    var username = $("username").value;
    var pass = $("password").value;
    
    if(validateUserEntry(username, pass)){
        $("loginForm").submit();
    }
    else{
        return false;//prevent the form from being submitted
    }
}

function createAccount(){
    var username = $("username").value;
    var pass = $("password").value;
    
    if(validateUserEntry(username, pass)){
        $("loginForm").submit();
    }
    else{
        return false;//prevent the form from being submitted
    }
}

window.onload = function(){
    $("loginButton").onclick = login;
    $("createAccount").onclick = createAccount;
};