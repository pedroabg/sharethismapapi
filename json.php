<?php
header("Content-Type:application/json");
include_once './services/ServiceController.php';


//if(isset($_GET["name"])){
//    
//    $data["search"] = searchService($_GET["name"]);
//    deliver_response(200, "success", $data);
//    
//}  else {
//    deliver_response(200, "Not found", NULL);
//}
//print_r($_GET);
$Service = new ServiceController($_GET['service']);

if($Service){    
    deliver_response(200, "success", $Service->serviceState->getJson($_GET['parameter']));
    
}else{
     deliver_response(200, "Not found", NULL);
}



function deliver_response($status, $status_message, $data) {
    header("HTTP/1.1 $status $status_message");
    $response["status"] = $status;
    $response["status_message"] = $status_message;
    $response["data"] = $data;
    $json_response = json_encode($response);
    echo $json_response;
}