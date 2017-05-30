<?php
session_start();

//When a user click the account button , the code below is executed and results output
?>
<div id="selectionh">
                        
                        
                        
<!-- The code directly below produces is the map on the left of the screen used to select a location to be insetred into the database --!>         
                   

        <div class="map_canvas" id="map_canvas"></div>
        



<script>
var map2 = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 4,
    center: new google.maps.LatLng(-25.363, 131.044),
    mapTypeId: google.maps.MapTypeId.ROADMAP, 
});

var myMarker = new google.maps.Marker({
    position: new google.maps.LatLng(-25.363, 131.044),
    draggable: true
});

google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    document.getElementById('lat').innerHTML =evt.latLng.lat().toFixed(3) ;
    rt=evt.latLng.lat().toFixed(3);
    rt2=evt.latLng.lng().toFixed(3);
});
google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    document.getElementById('lng').innerHTML = evt.latLng.lng().toFixed(3);
    rt=evt.latLng.lat().toFixed(3);
    rt2=evt.latLng.lng().toFixed(3);
});


map2.setCenter(myMarker.position);
myMarker.setMap(map2);


</script>

                        <!-- The code imediately below is the insert a new location form --!>
                        
                        
                        
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
                        
                     <!-- The code imediately below is the insert a new court form --!>

                         <div class="newcontcourt">
                        <div class="newheader">
                        Add New Court
                        </div>
                        <div class="newform"><br>
                        Name<br><input type="text" id="cna" /><br><br>
                        CourtDescription<br><input type="text" id="cda" /><br><br>
                        
                        
<?php 

// We run php code to extract all the locations in the database and present the results in the add new court form for a user to select and use while adding new court

$results = file_get_contents("http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/locations");

$results = json_decode($results, true);

$wezc=array();

     /* The courts are order from nearest to furtherst*/


                        foreach($results as $names){

                        $idt=$names['PKID'];
                        $name=$names['Name'];
                        array_push($wezc,array('id' =>$idt, 'Name' => $name ));



                        }
        // The results ordered alphabetically
 function compareByName($a, $b) {
  return strcmp($a["Name"], $b["Name"]);
}
usort($wezc, 'compareByName');
                                     
?>Location:<br>
<select id="loccou"><?php
 foreach($wezc as $key){

      $name= $key['Name'];
      $id=$key['id'];
         
   
?>
<option value="<?php echo $id; ?>">
<?php echo $name; ?>
</option>
<?php



                        }
                        
?>
</select><br><br>
                        
                        
                        
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
                          <select id="cty" >
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
                        
                        
                        

      
                        </div>
                        
                        <?php
                        ?>