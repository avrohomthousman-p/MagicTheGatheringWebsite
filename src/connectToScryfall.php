<?php
function sanitizeInput($cardname){
    return htmlentities($cardname);
}


function buildUrl($cardname){
    $url = "https://api.scryfall.com/cards/named?fuzzy=";
    $tokens = explode(" ", $cardname);
    foreach ($tokens as $current) {
        $url = $url . $current . "+";
    }
    
    //remove final "+"
    $url = substr($url, 0, strlen($url)-1);
    
    return $url;
}


function httpRequest($url){
    $get = ['batch_id'=> "2"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
    curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    $response = curl_exec($ch);
    $result = json_decode($response, true);
    curl_close($ch); // Close the connection
    
    
    //gather results
    
    if($result['object'] == "error"){
        return $result;
    }
    else{
        //use a new array that only includes the parts we need
        $cardData = array();
        
        $cardData['object'] = $result['object'];
        //The card name must be modified so it can be used as an HTML ID.
        //So stip non alphebetics and replace spaces with underscores. 
        $cardData['cardname'] = str_replace(" ", "_", $result['name']);
        $cardData['cardname'] = preg_replace('/[^a-zA-Z_]/', "", $cardData['cardname']);
    
        $cardData['picUrl'] = $result['image_uris']['normal'];
        
        return $cardData;
    }
}


function requestCardData($cardname){
    $cardname = sanitizeInput($cardname);
    $url = buildUrl($cardname);
    $data = httpRequest($url);
    return $data;
}


function getRandomCard(){
    return httpRequest("http://api.scryfall.com/cards/random");
}


