<?php
session_start();

$user=$_POST['em'];
$pass=$_POST['pass'];
$coda=strtolower($_POST['coda']);

$resultsl = file_get_contents("http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/locations");

$resultsl = json_decode($resultsl, true);
$stringin='Location: <br><select id="idloc">';

$wezc=array();

     /* The courts are order from nearest to furtherst*/


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



	$results = file_get_contents("http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/users");

$results = json_decode($results, true);
$choice=$user;
$outpt=$pass;


                        foreach($results as $names){

                        $user2=$names['UserName'];
                        $salt=$names['Salt'];
                        $passsalted=$names['SaltedPassword'];
                        $auth_user = hash('sha256', $pass.$salt);
                        

                    if ( ($user2 == $user) && ($auth_user == $passsalted)){
                    $_SESSION['fmcuser']= $names['PKID'];
                    $_SESSION['user']= $user2;
                    $choice='good';
                    
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
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                        </select>
                        <br><br>
                         
                        <div class="subc" id="addcourt">ADD</div>
                        </div>
                        </div>
                        
                        
                        </div>
                        
                        
                        

        <button onclick="getLocation()" id="rtrt" class="etitle" data-com=""><div id="ee">Set location</div></button>
                        </div>';
                        
                        

                       
                          
                             } 



                                        

                        }
$flags='
                        <object width="30" style="position:absolute; left:-30px; top:50%; transform:translateY(-50%);" data="4x3/'.$coda.'.svg" type="image/svg+xml">
  
</object>';
echo json_encode(array("a" => $choice, "b" => $outpt, "c" => $flags));
?>