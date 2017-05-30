<?php
  /* The the below are the the user's details being processed for signing up  */
session_start();
$ln=$_POST['ln'];
$ld=$_POST['ld'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$usr=$_POST['usr'];
$pkid=0;
$cort=[];




//API Url
$url = 'http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/Locations';
 
//Initiate cURL.
$ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//The JSON data.
$jsonData =  array(
        'LocationDescription' => $ld,
        'Name' =>  $ln,
        'Latitude' => $lat,
        'Longitude' => $lng,
        'Courts'=>$cort,
        'PKID' => $pkid,
        'SubmittedUserName'=> $usr
        );
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
//Execute the request
if($result = curl_exec($ch)){

$choice='good';
  /* The below is the add new courts map JavaScript code saved inside element $output */

                        $outpt='';

    
                    
} else{

$choice='bad';
  /* The below is the add new courts map JavaScript code saved inside element $output */

                        $outpt='';

}




                        
echo json_encode(array("a" => $choice, "b" => $outpt));


?>