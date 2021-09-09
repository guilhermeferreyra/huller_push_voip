<?php
function arrangeData($exten, $password){
    $data = [
        "authuser" => $exten,
        "secret" => $password,
        "serverAddress" => "https://webrtc.scaip.com.br:8089/janus",
        "proxy" => "sip:voip.scaip.com.br:65060",
        "request" => "register",
        "username" => "sip:$exten@voip.scaip.com.br:65060",
        "sipCallAddress" => 'sip:NUM@voip.scaip.com.br:65060'
    ];
    http_response_code(200);
    header('Content-type: application/json');
    return $data;
}

$user = $_GET['user'];

if($user == "veni"){
    echo json_encode(arrangeData("1198601", "G3Vp&Rj59UKKxE4"));
}
elseif($user == "gui"){
    echo json_encode(arrangeData("1198602", "wwnP5@*Cr$4mTyKg"));
}
else{
    http_response_code(400);
}