

function validateForm(){
    var allValid = true;
    var regex = new RegExp(/[a-zA-Z]+@[a-zA-Z]+.[a-zA-Z]+/);
    var text = $("input#name").val();
    
    if(text == ""){
        $("span#nameError").text("This feild is required.");
        allValid = false;
    }
    else{
        $("span#nameError").text("");
    }
    
    
    text = $("input#email").val();
    if(text == ""){
        $("span#emailError").text("This feild is required.");
        allValid = false;
    }
    else if(!regex.test(text)){
        $("span#emailError").text("Please enter a valid email address.");
        allValid = false;
    }
    else{
        $("span#emailError").text("");
    }
    
    
    text = $("textarea#explenation").val();
    if(text == ""){
        $("span#explenationError").text("This feild is required.");
        allValid = false;
    }
    else{
        $("span#explenationError").text("");
    }
    

    if(document.querySelectorAll('input[type="radio"]:checked').length !== 1){
        $("span#problemTypeError").text("Please select type of isssue you are experiancing");
        allValid = false;
    }
    else{
        $("span#problemTypeError").text("");
    } 

    
    
    text = $("input#date").val();
    if(text == ""){
        $("span#dateError").text("This feild is required.");
        allValid = false;
    }
    else{
        $("span#dateError").text("");
    }
    
    
    return allValid;
}



$(document).ready(function(){
    $("button#submit").click(function(evt){
        console.log($("input[type=radio]:checked"));
        return validateForm();
    });
});
