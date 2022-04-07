<?php


session_start();


include 'header.php';
include 'DatabaseQueries.php';
include 'loginBox.php';
include 'footer.php';


$links = array("<link href=\"loginBox.css\" rel=\"stylesheet\" type=\"text/css\" />");
$output;
        


if(isset($_POST['loginButton'])){//if the user just logged in through the login form
    $loginData = login($_POST['username'], $_POST['password']);
    
    if($loginData === "Username not found"){
        $output = createLoginBoxWithMessages("Username not found", "&nbsp");
        array_push($links, "<script src=\"errorCheckLogin.js\"></script>");
    }
    else if($loginData === "Incorrect password"){
        $output = createLoginBoxWithMessages("&nbsp", "Incorrect password");
        array_push($links, "<script src=\"errorCheckLogin.js\"></script>");
    }
    else{
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['userID'] = $loginData;
        $output = createLogOutButton();
        setcookie("lastLoggedIn", date("m/d/Y h:ia", time()), time() + 2592000);//expires in a month
    }
}
else if(isset($_POST['createAccount'])){//if the user just created a new account through the login form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $addAttempt = createAccount($username, $password);
    if($addAttempt === "That username is taken"){
        $_SESSION['loggedIn'] = false;
        $output = createLoginBoxWithMessages("That username is taken", "&nbsp");
        array_push($links, "<script src=\"errorCheckLogin.js\"></script>");
    }
    else{
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userID'] = $addAttempt;
        $output = createLogOutButton();
        setcookie("lastLoggedIn", date("m/d/Y h:ia", time()), time() + 2592000);//expires in a month
    }
}
else if(isset($_POST['logout'])){
    session_destroy();
    session_start();
    $_SESSION['loggedIn'] = false;
    $output = createLoginBox();
    array_push($links, "<script src=\"errorCheckLogin.js\"></script>");
}
else if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
    $output = createLogOutButton();
}
else{
    $_SESSION['loggedIn'] = false;
    $output = createLoginBox();
    array_push($links, "<script src=\"errorCheckLogin.js\"></script>");
}


echo(createHead("Manage Your Collection-Login", $links));

echo($output);

echo(createFooter());

