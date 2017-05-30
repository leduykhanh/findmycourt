<?php
  /* The the below are the the user's details being processed for signing up  */
session_start();
$cna=$_POST['cna'];
$cda=$_POST['cda'];
$idloc=$_POST['idloc'];
$bbt=$_POST['bbt'];
$net=$_POST['net'];
$scoreb=$_POST['scoreb'];
$cty=$_POST['cty'];
$ind=$_POST['ind'];
$usr=$_POST['usr'];
$pkid=0;





//API Url
$url = 'http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/Courts';
 
//Initiate cURL.
$ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//The JSON data.
$jsonData =  array(
        'HasNet' => $net,
        'IsIndoor' =>  $ind,
        'BackboardTypeID' => $bbt,
        'CourtName' => $cna,
        'LocationID'=>$idloc,
        'HasScoreboard' => $scoreb,
        'PKID' => $pkid,
        'CourtDescription' => $cda,
        'SubmittedUserName' => $usr,
        'CourtTypeID' => $cty
        
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