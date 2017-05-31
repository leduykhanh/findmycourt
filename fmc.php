<?php

  /* We acquire the user coordinates below */

$latitude1=$_POST['lat'];
$longitude1=$_POST['lon'];
global $search_box;

function filter_name($a){
	$search_box = $_POST['search_box'];
	return $a["Name"] == $search_box;
}
  /* We calculate the distance with function below. Here two points (coordinates) are required*/

function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Km') {
     $theta = $longitude1 - $longitude2;
     $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
     $distance = acos($distance);
     $distance = rad2deg($distance);
     $distance = $distance * 60 * 1.1515; switch($unit) {
          case 'Mi': break; case 'Km' : $distance = $distance * 1.609344;
     }
   return number_format(round($distance,0));
}
  /* We the function below aqcuires a city name*/

function reverse_geocode($address) {
	$address = str_replace(" ", "+", "$address");
	$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
	$result = file_get_contents("$url");
	$json = json_decode($result);
	$state = "";
	$country = "";
	foreach ($json->results as $result) {
		foreach($result->address_components as $addressPart) {
		  if((in_array('locality', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $city = $addressPart->long_name;
	    	else if((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $state = $addressPart->long_name;
	    	else if((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $country = $addressPart->long_name;
		}
	}
	
	if(($city != '') && ($state != '') && ($country != ''))
		$address = $city.', '.$state.', '.$country;
	else if(($city != '') && ($state != ''))
		$address = $city.', '.$state;
	else if(($state != '') && ($country != ''))
		$address = $state.', '.$country;
	else if($country != '')
		$address = $country;
		
	// return $address;
	return "$city";
}

  /* We the function below aqcuires a country name*/

function reverse_geocode2($address) {
	$address = str_replace(" ", "+", "$address");
	$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
	$result = file_get_contents("$url");
	$json = json_decode($result);
		$state = "";
	$country = "";
	foreach ($json->results as $result) {
		foreach($result->address_components as $addressPart) {
		  if((in_array('locality', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $city = $addressPart->long_name;
	    	else if((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $state = $addressPart->long_name;
	    	else if((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types)))
		  $country = $addressPart->long_name;
		}
	}
	
	if(($city != '') && ($state != '') && ($country != ''))
		$address = $city.', '.$state.', '.$country;
	else if(($city != '') && ($state != ''))
		$address = $city.', '.$state;
	else if(($state != '') && ($country != ''))
		$address = $state.', '.$country;
	else if($country != '')
		$address = $country;
		
	// return $address;
	return "$country";
}

  /* The below is the google MAPS API which provides us with user location details in JSON format*/


   $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='
                                         .$latitude1.','.$longitude1.'&sensor=false');

   
   $output= json_decode($geocode);

   //Here "formatted_address" is used to display the address in a user friendly format.
   
   $ghjdhgd= $output->results[0]->formatted_address;
   
   $rtrttrt = reverse_geocode($ghjdhgd);
   $rtrttrt2 = reverse_geocode2($ghjdhgd);
   $rthy=$rtrttrt.",".$rtrttrt2;
   
   
   
   
   
     /* The courts search results are displayed below*/

   
   ?> 
     <div id="loadup">
<div class="urhia">
   <img src="vbx5.png"/>
You are in <?php echo $rtrttrt; echo $latitude1.','.$longitude1;?>, <?php   echo $rtrttrt2;?>.
</div>

<div class="spentit">COURTS NEAR YOU</div>
<?php
     /* We aqcuire a list of court in JSON format from a WCF endpoint*/

	$results = file_get_contents("http://fmc.livesportaustralia.com.au/FindMyCourt/FindMyCourtService.svc/json/locations");

$results = json_decode($results, true);

$wezc=array();
$stringin="";
$search_box = $_POST['search_box'];
if($search_box){
	$results = array_filter($results, "filter_name");
}
// $myfile = fopen("addrr.txt", "w") or die("Unable to open file!");




     /* The courts are order from nearest to furtherst*/


                        foreach($results as $names){

                        $latitude2=$names['Latitude'];
                        $longitude2=$names['Longitude'];
                        // $txt = "\"" .$names["Name"] . "\"," ;
                        // fwrite($myfile, $txt);

$stringin=$stringin."{\"cname\":\"".$names['Name']."\",\"lat\":\"".$names['Latitude']."\",\"lon\":\"".$names['Longitude']."\"},";




                
     /* The distance between courts is calculate by using functions*/

                        $dist = getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Km'); 
                        $idt=$names['PKID'];
                        array_push($wezc,array('id' =>$idt, 'dist' => $dist, 'lat' => $latitude2, 'lon' => $longitude2));



                        }
                        $stringin=rtrim($stringin, ",");
                $stringcood="[".$stringin."]";
        
                        
                        // Sort the array by PKID.
                              usort($wezc, function ($a, $b) {
                                  return strcmp($a['dist'], $b['dist']);
                              });
                                     
// fclose($myfile);
 foreach($wezc as $names2){

$rt=$names2['id'];

foreach($results as $key)
   {
      if ( $key['PKID'] === $rt ){
      $name= $key['Name'];
      $lat=$key['Latitude'];
      $lon=$key['Longitude'];
         }
   }
  ?><div class="nameres"  ><div class="thumb" id="<?php echo $name?>"><img src="https://maps.googleapis.com/maps/api/streetview?size=180x120&location=<?php echo $names2['lat'];?>,<?php echo $names2['lon'];?>&key=AIzaSyDTLcyW5WULXUmplJvVKNKyz4hTV9vgH6c&fov=90&heading=235&pitch=10"></div><div class="plname" id="<?php echo $name?>" data-lat="<?php echo $lat?>"  data-lon="<?php echo $lon?>" data-name="<?php  echo $name;?>" data-id="<?php  echo $rt;?>" ><br><?php  echo $name;?>  <div class="kl">  <?php echo $names2['dist'];?> km away</div></div></div><?php




                        }
                        
?>
<div id="json" class="jsonres"><?php echo  $stringcood ; ?></div>
</div>
