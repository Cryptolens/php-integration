<?php

// To get this code to work, please change the values below

// This should only be shared with those who are authorized to create these keys
// Please use a random string with high entropy, eg. using openssl,
// $ openssl rand -base64 32
$secret = "secretkey";

// An access token with 'Create Key' permission.
$token = "{token}";

// This should be changed depending on the properties that the new license key should have
// Please see https://app.cryptolens.io/docs/api/v3/CreateKey for the available parameters.
$create_key_request = "https://app.cryptolens.io/api/key/createkey?productId=3939&period=7&F1=true";


// ------------ Be careful when changing the code below ---------------------

header('Content-Type: application/json');
header('HTTP/1.1 200 Ok');

function errorResult() 
{
    $data = [
        "message" => "Authentication failed.", "result" => "1"];
    echo json_encode($data);
}

if ($_REQUEST["auth"] != $secret) 
{   
    errorResult();
    return;
}

function send_get_request($request, $token){
    // Create a stream
    $opts = array(
        'http'=>array(
        'method'=>"GET",
        'header'=>"token: " . $token . "\r\n"
        )
    );
  
    $context = stream_context_create($opts);
  
    // Open the file using the HTTP headers set above
    return file_get_contents($request, false, $context);
}

// we just want to create a new license key
$file = send_get_request($create_key_request, $token);

if($file === false)
{
    errorResult();
    return;
}

header('HTTP/1.1 200 Ok');
header('Content-Type: application/json');
echo $file;

?>