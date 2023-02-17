<?php


function createLoginBox(){
    return createLoginBoxWithMessages("&nbsp", "&nbsp");
}



function createLoginBoxWithMessages($usernameError, $passwordError){
    $loginBox = <<< TEXT
            
            
            
<form method="POST" action="loginPage.php" id="loginForm">
    <h1>Please Log in to Access Your Collection</h1>
    <div class="form-group">
        <label for="username" >Username </label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        <span class="text-danger" id="usernameError">{$usernameError}</span>
    </div>
    <div class="form-group">
        <label for="password" >Password </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="text-danger" id="passwordError">{$passwordError}</span>
    </div>
    <button type="submit" class="btn btn-primary" name="loginButton" id="loginButton" autocomplete="off" >Login</button>
        Or
    <button type="submit" class="btn btn-primary" name="createAccount" id="createAccount" autocomplete="off" >Create Account</button>
</form>            
            
            
TEXT;
    
    return $loginBox;
}


function createLogOutButton(){
    $loggedIn = (isset($_COOKIE['lastLoggedIn']) ? $_COOKIE['lastLoggedIn'] : "never");
    
    $logout = <<< TEXT
            <form class="text-center" id="logOutBox" method="POST" action="loginPage.php" >
                <h1>Hello {$_SESSION['username']}. You Have Logged in Sucsessfully.</h1>
                <p>Last logged in: {$loggedIn}</p>
                <p>You can now acsess you collection by <a href="displayCollection.php">clicking here</a> or
                    clicking the link in the navigation bar</p>
                <button type="submit" class="btn btn-primary" name="logout" id="logout">Log out</button>
            </form>
            
TEXT;
    
    return $logout;
}

