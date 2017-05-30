<?php
  /* The the below are the the user's details being processed for signing up  
  All the code below proceses the sign up process
  */
session_start();
$usr=$_POST['usr'];
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$em=$_POST['em'];
$pass=$_POST['pass'];
$coda=strtolower($_POST['coda']);
$home=0;

// On success sign up, the user is redirected to an accounts page where the can add a new location. The code immediately below processes the current locations in the database and add the results to the account page to allow a user to enable a user to select a location when adding a court  
$resultsl = file_get_contents("http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/locations");

$resultsl = json_decode($resultsl, true);
// This string is  made for output purposes if sign up is successful 
$stringin='Location: <br><select id="idloc">';

$wezc=array();

 /* The courts are order from nearest to furtherst with foreach each loop and a function*/


                        foreach($resultsl as $names){

                        $idt=$names['PKID'];
                        $name=$names['Name'];
                        array_push($wezc,array('id' =>$idt, 'Name' => $name ));



                        }
        
 function compareByName($a, $b) {
  return strcmp($a["Name"], $b["Name"]);
}
usort($wezc, 'compareByName');
                                     
 foreach($wezc as $key){

      $name= $key['Name'];
      $id=$key['id'];
            $stringin=$stringin.'<option id="'.$id.'">'.$name.'</option>';


                        }
                                        
   $stringin=$stringin.'</select><br><br>';

//API Url
$url = 'http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/users';
 
//Initiate cURL.
$ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//The JSON data.
$jsonData =  array(
        'UserName' => $usr,
        'FirstName' =>  $fn,
        'LastName' => $ln,
        'EmailAddress' => $em,
        'Password' => $pass,
        'HomeLocationID'=>$home);
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


	$results = file_get_contents("http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/users");

$results = json_decode($results, true);
$choice=$usr;
$outpt=$pass;

  /* We select the newly registered user and log them in */


                        foreach($results as $names){

                        $user2=$names['UserName'];
                        $salt=$names['Salt'];
                        $passsalted=$names['SaltedPassword'];
                        $auth_user = hash('sha256', $pass.$salt);
                        

                    if ( ($user2 == $usr) && ($auth_user == $passsalted)){
                    $_SESSION['fmcuser']= $names['PKID'];
                    $_SESSION['user']= $user2;
                    }
         }
                    
}



$choice='good';
  /* The below is the add new courts map JavaScript code saved inside element $output */
//The output variable is a string with HTML and javascript content
                        $outpt='<div id="selectionh">
                        
                        
                        
                        
                   

        <div class="map_canvas" id="map_canvas"></div>
        


    


  <script>
var map2 = new google.maps.Map(document.getElementById(\'map_canvas\'), {
    zoom: 4,
    center: new google.maps.LatLng(-25.363, 131.044),
    mapTypeId: google.maps.MapTypeId.ROADMAP, 
});

var myMarker = new google.maps.Marker({
    position: new google.maps.LatLng(-25.363, 131.044),
    draggable: true
});

google.maps.event.addListener(myMarker, \'dragend\', function (evt) {
    document.getElementById(\'lat\').innerHTML =evt.latLng.lat().toFixed(3) ;
    rt=evt.latLng.lat().toFixed(3);
    rt2=evt.latLng.lng().toFixed(3);
});
google.maps.event.addListener(myMarker, \'dragend\', function (evt) {
    document.getElementById(\'lng\').innerHTML = evt.latLng.lng().toFixed(3);
    rt=evt.latLng.lat().toFixed(3);
    rt2=evt.latLng.lng().toFixed(3);
});

google.maps.event.addListener(myMarker, \'dragstart\', function (evt) {
    document.getElementById(\'current\').innerHTML = \'<p>Currently dragging marker...</p>\';
});

google.maps.event.addListener(myMarker, \'dragend\', function (evt) {
    document.getElementById(\'current\').innerHTML = \'<p>Marker Dropped</p>\';
});

map2.setCenter(myMarker.position);
myMarker.setMap(map2);


</script>

                        
                    
                      
                        <div class="contcont">
                        <div class="newcont">
                        <div class="newheader">
                        Add New Location
                        </div>
                        <div class="newform"><br>
                        Name<br><input type="text" id="lna" /><br><br>
                        Location Description<br><input type="text" id="lda" /><br><br>                        
                        Latitude: <div id="lat"></div><br>
                        Longitutde: <div id="lng"></div><br>
                        <div class="subc" id="addloc">ADD</div>
                        </div>
                        </div>
                        
                        
                         <div class="newcontcourt">
                        <div class="newheader">
                        Add New Court
                        </div>
                        <div class="newform"><br>
                        Name<br><input type="text" id="cna" /><br><br>
                        CourtDescription<br><input type="text" id="cda" /><br><br>'.$stringin.'
                        
                        
                        
                        
                        
                        
                        Backboard Type<br><select id="bbt" >
                        <option value="1">Acrylic</option>
                        <option value="2">Tempered Glass</option>
                        <option value="3">Plastic</option>
                        <option value="4">Metal</option>
                        <option value="5">Wood</option>
                        </select>
                        <br><br>
                        Net:<br>
                        <select id="net" >
                        <option value="true">Available</option>
                        <option value="false">Not Available</option>
                        </select>
                        <br><br>
                        Scoreboard:<br>
                        <select id="scoreb" >
                        <option value="true">Available</option>
                        <option value="false">Not Available</option>
                        </select>
                        <br><br>
                        CourtTypeID: <br>
                          <select id="net" >
                        <option value="1">Hardwoord</option>
                        <option value="2">Asphalt</option>
                        <option value="3">Vulcanized Rubber</option>
                        </select>
                         <br><br>
                        Indoor: <br>
                        <select id="ind" >
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>
                        <br><br>
                         
                        <div class="subc" id="addcourt">ADD</div>
                        </div>
                        </div>
                        
                        
                        </div>
                        
                        
                        

        <button onclick="getLocation()" id="rtrt" class="etitle" data-com=""><div id="ee">Set location</div></button>
                        </div>';
                        // the $flags variable selects a flag from the 4x3 folder in which corresponds with the user's country
                        $flags='
                        <object width="30" style="position:absolute; left:-30px; top:50%; transform:translateY(-50%);" data="4x3/'.$coda.'.svg" type="image/svg+xml"></object>';
echo json_encode(array("a" => $choice, "b" => $outpt, "c" => $flags));


?>