<?php
use PHPMailer\PHPMailer\PHPMailer;

function createForm(){
    
    $form = <<< TEXT
      
   
<div>
    <form method="POST" action="contactUs.php">
        <div class="row">
            <div id="left" class="col-md-6 form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                <span class="text-danger d-block" id="nameError">&nbsp</span>
        
                <label for="email">Email Address: </label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email Address">
                <span class="text-danger d-block" id="emailError">&nbsp</span>
        
                <label for="explenation" >Please tell describe the issue</label>
                <textarea id="explenation" name="explenation" rows="5" cols="50" class="form-control"></textarea>
                <span class="text-danger d-block" id="explenationError">&nbsp</span>
            </div>
        
            <div id="right" class="col-md-6">
                <label for="problemType">What is the nature of the problem?</label>
                <ul id="problemType">
                    <li>
                    <label><input type="radio" value="technicalIssue" name="problemType" >Technical Issue</label>
                    </li>
        
                    <li>
                    <label><input type="radio" value="suggestion" name="problemType" >Suggestion</label>
                    </li>
        
                    <li>
                    <label><input type="radio" value="question" name="problemType" >Question</label>
                    </li>
        
                    <li>
                    <label><input type="radio" value="other" name="problemType" >Other</label>
                    </li>
                </ul>
                <span class="text-danger d-block" id="problemTypeError">&nbsp</span>
        
                <label for="date">When did the issue first occur?</label>
                <input type="date" name="date" id="date" class="form-control">
                <span class="text-danger d-block" id="dateError">&nbsp</span>
            </div>
        
        
        </div>
        
        <div class="text-center">
            <button id="submit" type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </div>
    </form>
</div>
        
        
TEXT;
    
    
    return $form;
}


function createThankYouSection(){
    $section = <<< TEXT
            
    <h1>Thank you for your feedback. We will contact you by email shortly.</h1>
            
    <p class="text-center">Contact us again? <a href="contactUs.php">click here</a>.</p>
            
            
TEXT;
    
    
    
    return $section;
}






include 'header.php';
include 'footer.php';





if(isset($_POST['submit'])){
    //handel submitted data
    require 'PHPMailer-master/src/PHPMailer.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'INSERT EMAIL ADDRESS';
    $mail->Password = 'INSERT PASSWORD';
    $mail->setFrom('INSERT EMAIL ADDRESS');
    $mail->addAddress('INSERT EMAIL ADDRESS');
    $mail->Subject = $_POST['problemType'];
    $mail->Body = <<< TEXT
            User {$_POST['name']} reported an issue on {$_POST['date']}.
            He can be contacted at {$_POST['email']}.\n
            Message: {$_POST['explenation']}
            
            
TEXT;
    
    
    echo(createHead("Manage Your Collection-Contact Us", array()));
    
    //send the message, check for errors
    if($mail->send()){
        echo(createThankYouSection());
    }
    else{
        echo("<h1 class=\"text-center\">Something went wrong. Please try again later</h1>");
        echo("<p class=\"text-center\">" . $mail->ErrorInfo . "<p>");
    }
    
    echo(createFooter());
    exit();

}





echo(createHead("Manage Your Collection-Contact Us", array(
    "<link href=\"contactUs.css\" rel=\"stylesheet\" type=\"text/css\" />",
    "<script src=\"contactUsErrorCheck.js\"></script>"
)));


echo(createForm());


echo(createFooter());

