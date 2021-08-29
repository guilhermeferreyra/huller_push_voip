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

function post_data($key, $value){
    try{
        $redis = new Redis();
        $redis->connect("redis");
        $redis->setex($key, 120, $value);
        echo "OK!";
    }catch( Exception $e ){ 
        echo $e->getMessage(); 
    }
}
post_data($decoded->key, $decoded->value);