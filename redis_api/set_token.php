<?php
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
 
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);
$token = $decoded->token;
$device = $decoded->device;
$id_user = $decoded->id_user;

function post_data($token, $device, $id_user){
    try{
        $redis = new Redis();
        $redis->connect("redis");
        $redis->set("token_$id_user", "{token:$token, device:$device}");
        echo "token_$id_user, {token:$token, device:$device}";
        #echo "OK!";
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}
post_data($decoded->key, $decoded->value);