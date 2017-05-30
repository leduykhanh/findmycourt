<?php
session_start();
?>
<html>
<head>
<title>Welcome to Find My Court
</title>
<!-- The code immedaitely below are links to stylesheets and website icons -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="s1.css" type="text/css" />
<link rel="icon" href="vbx2.png">
<link rel="apple-touch-icon" sizes="57x57" href="vbx2.png" />
<link rel="apple-touch-icon" sizes="72x72" href="vbx2.png" />
<link rel="apple-touch-icon" sizes="114x114" href="vbx2.png" />
<link rel="apple-touch-icon" sizes="144x144" href="vbx2.png" />
<script type="text/javascript" src="jqueryx.min.js"></script>
</head>
<body>

<!-- Below is the sign in form -->
<div id="fade" class="black_overlay"></div>
<div id="sharep" class="sign_in_platform">
                <div id="close" class="closex">
                <a href = "javascript:void(0)" onclick = "document.getElementById('sharep').style.display='none';document.getElementById('fade').style.display='none'">X</a>
                </div>
                <div class="logo_si">
                  <img src="vbx3.png">
                
                </div >
                <div class="signupform">
                <div class="boldsignup">Sign In </div>
                <div id="login" class="loginb">Sign In</div>
                <form method="post">
                <input type="text" id="em2" placeholder="Username" required><br>
                <input type="password" id="pass2" placeholder="Password" required>
                </form>
                <br>
                </div>
</div>
<!-- Below is the sign up form -->

<div id="fade2" class="black_overlay2"></div>
<div id="sharep2" class="sign_up_platform">
                <div id="close2" class="closex2">
                <a href = "javascript:void(0)" onclick = "document.getElementById('sharep2').style.display='none';document.getElementById('fade2').style.display='none'">X</a>
                </div>
                <div class="logo_si">
                <img src="vbx3.png">
                </div>
                <div class="signupform">
                <div class="boldsignup">Sign Up </div>
                <div class="submitsign2">Sign Up</div>
                <form method="post">
	<input type="text" id="usr" placeholder="Username" onBlur="blurUser()" required>
	<br>
	<input type="text" id="fn" placeholder="First Name" onBlur="blurFN()" required>
	<br>
	<input type="text" id="ln" placeholder="Last Name" onBlur="blurLN()" required>
	<br>
	<input type="email" id="em" placeholder="Email" onBlur="blurE()" required>
	<br>
	<div class="lol">
		<input type="password" id="pass" placeholder="Password" onBlur="blurP()" required>
	</div>
	<div class="submitsign2">Sign Up</div>
	</div>
                </form>
                <br>
                </div>
</div>
<div class="signinb" id="exes" href = "javascript:void(0)" onclick = "document.getElementById('sharep').style.display='block';document.getElementById('fade').style.display='block';">
SIGN IN
</div>
<div class="signupb" id ="xoxo" href = "javascript:void(0)" onclick = "document.getElementById('sharep2').style.display='block';document.getElementById('fade2').style.display='block';">
SIGN UP
</div>
<div id="hjjh" class="nameusr">

</div>
<div id="logoutx" class="logoutb">
LOG OUT
</div>
<!-- Below is the find my court search interface -->

<div class="fmchead">
<div class="headlogo">
  <a href="index.php"> <img src="llk.png"/> </a>
</div>
</div>
<div class="navbar"><div class="menucont"><span class="tete" ><a id="homebtn" onclick="initMap()">HOME</a></span><span class="tetea" id="ttt"><a id="accbtn">ACCOUNT</a></span><span class="tete"><a id="contactbtn">CONTACT US</a></span><span class="tete"><a id="helpbtn">FAQs</a></span></div></div>

<div class="bodysel" id="mainsel">

                        <div id="selectiona">
                        <div class="mappanel" id="panel">
                        
                        
                        </div>
                        <div class="mapcont" id="map">
                        </div>

                        <div class="listcont" id="list">
                       <div id="loadup">
                        <div class="wellog">
<img src="llk.png"/>
</div>
                        <input style="position:relative;    display: block;  top: 240px;margin: 0 auto; " type="text" name="" placeholder="enter an address">
                        <button class="btnfmcfind" id="test" onclick="getLocation()">Search</button>
                        <div class="introscreen">
                        WELCOME TO FIND MY COURT.<br><br>
                        CLICK THE BUTTON ABOVE TO FIND A BASKETBALL COURT NEAR YOU!
                        </div>
                        </div>
                        </div>

                        </div>


</div>
<div class="fmcbottom">
	<iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Ffindmycrt%2F&width=64&height=65&layout=button&size=small&show_faces=true&appId" width="64" height="20" style="border:none; overflow:hidden; line-height:60px; position: absolute; top:20px;  right:10px;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	
	<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fstarsvillage.com%2FFMC%2F&layout=button&mobile_iframe=true&width=58&height=20&appId" width="58" height="20" style="border:none; overflow:hidden; position: absolute; line-height:60px; top:20px; right: 80px;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	
<div class="footlogo">
<img src="lva.png"/>
</div>
</div>

<!-- Below javascript is run immediately the page is loaded. In safari a Jquery function with an API is executed to find the user's coordinate on earth while other browers use javascript to find the users coordinates on Earth  -->
<script>
function blurUser() {
	var u = document.getElementById("usr").value;
	if(u == "" || u == null) {
		document.getElementById("usr").style.borderColor = "red";		
		return false;
	} else if(/[^a-zA-Z0-9\-\/]/.test(u)) {
		document.getElementById("usr").style.borderColor = "red";
        return false;
	} else {
		document.getElementById("usr").style.borderTop = "0px";
		document.getElementById("usr").style.borderLeft = "0px";
		document.getElementById("usr").style.borderRight = "0px";
		document.getElementById("usr").style.borderBottom = "1px solid dimgrey";
		return true;
	}
	
}
function blurFN() {
	var f = document.getElementById("fn").value;
	if(f == "" || f == null) {
		document.getElementById("fn").style.borderColor = "red";
		return false;
	} else if(/[^a-zA-Z]/.test(f)) {
		document.getElementById("fn").style.borderColor = "red";
        return false;
	} else {
		document.getElementById("fn").style.borderTop = "0px";
		document.getElementById("fn").style.borderLeft = "0px";
		document.getElementById("fn").style.borderRight = "0px";
		document.getElementById("fn").style.borderBottom = "1px solid dimgrey";
		return true;
	}
	
}
function blurLN() {
	var l = document.getElementById("ln").value;
	if(l == "" || l == null) {
		document.getElementById("ln").style.borderColor = "red";
		return false;
	} else if(/[^a-zA-Z]/.test(l)) {
		document.getElementById("ln").style.borderColor = "red";
        return false;
	} else {
		document.getElementById("ln").style.borderTop = "0px";
		document.getElementById("ln").style.borderLeft = "0px";
		document.getElementById("ln").style.borderRight = "0px";
		document.getElementById("ln").style.borderBottom = "1px solid dimgrey";
		return true;
	}
	
}
function blurE() {
	var e = document.getElementById("em").value;
	if(e == "" || e == null) {
		document.getElementById("em").style.borderColor = "red";
		return false;
	} else {
		document.getElementById("em").style.borderTop = "0px";
		document.getElementById("em").style.borderLeft = "0px";
		document.getElementById("em").style.borderRight = "0px";
		document.getElementById("em").style.borderBottom = "1px solid dimgrey";
		return true;
	}
	
}
function blurP() {
	var p = document.getElementById("pass").value;
	if(p == "" || p == null) {
		document.getElementById("pass").style.borderColor = "red";
	} else if(p.length < 8) {
		document.getElementById("pass").style.borderColor = "red";
	} else {
		document.getElementById("pass").style.borderTop = "0px";
		document.getElementById("pass").style.borderLeft = "0px";
		document.getElementById("pass").style.borderRight = "0px";
		document.getElementById("pass").style.borderBottom = "1px solid dimgrey";
	}	
}
</script>

<script>

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


$.getJSON('https://freegeoip.net/json/') 
     .done (function(location)
     {

          if(window.coucode=location.country_code){
         
          
          
          $.ajax({
type: "POST",
url: "code.php",
cache: false,
data: "coucode="+coucode, 
success: function(data){
$("body").append(data); 
}
});
}
 
     });
     </script>
     <script>
// Here determine if the browser is safari. Why? Safari does not standard javascript coordinates detecting functions and we have to use Jquery with this browser -Safari.
if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1)
 {alert('Its Safari');

$.getJSON('https://freegeoip.net/json/') 
     .done (function(location)
     {

          window.lat=location.latitude;
          window.lon=location.longitude;
          
           $('.btnfmcfind').first().css('display', 'block'); 
 
     });
} else{
window.onload = getLocation1;
function getLocation1() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
   window.lat= position.coords.latitude;
    window.lon= position.coords.longitude;
   $('.btnfmcfind').first().css('display', 'block'); 

    
}


}
</script>
<!-- The script below finds and displays courts near the user using AJAX -->
<script>


var x = document.getElementById("list");
var marker2;
var marker;
var json;
var markers = [];
var infoWindows = [];


function getLocation() {
    $("#test").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  

            console.log(lon);

            if(1==1)
            {
            $.ajax({
            type: "POST",
            url: "fmc.php",
            data: {lon: lon, lat: lat}, 
            cache: false,
            success: function(html){
                $("#test").remove();  
                
$("#loadup").remove();  
            $("#list").append(html);
            
             var json = $("#json").text();
             json=String(json);             
             
                        var arr= '[{"cname":"Mooroolbark College Courts","lat":"-37.7741905","lon":"145.3142618"},{"cname":"Rolling Hills Primary School ","lat":"-37.7668276","lon":"145.3268492"},{"cname":"New","lat":"-37.9839545169","lon":"145.081109069"}]';
            
                        var jsonObj = $.parseJSON(arr);
            
            json=json.replace("'", "\'");
            json=$.parseJSON(json);
            
            
            window.mex=new google.maps.LatLng(lat, lon);
            var bounds = new google.maps.LatLngBounds();
            bounds.extend(mex);
            
            
                                                         window.markerx = new google.maps.Marker({
                                                                position: new google.maps.LatLng(lat, lon),
                                                                map: map,
                                                                clickable: true,
                                                                icon: "vbx5.png"
                                                            });
                
            
                
                                                           markerx.content = "You are here" ;

                                            var infoWindow = new google.maps.InfoWindow();
                                            google.maps.event.addListener(markerx, 'click', function () {
                                                                            infoWindow.setContent(this.content);
                                                                            infoWindow.open(this.getMap(), this);

                                                                        });
                                                                        google.maps.event.addListener(markerx, 'click', function() {
                                                                        map.setZoom(10);
                                                                        map.panTo(this.getPosition());
                                                                        }); 


            
for (var key in json) {
    if (json.hasOwnProperty(key)) {

      bounds.extend(new google.maps.LatLng(json[key]["lat"] ,json[key]["lon"]));


      
    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(json[key]["lat"], json[key]["lon"]),
                    map: map,
                    clickable: true,
                    icon: "vbx4.png"
                });
                
            
                window['mar' + json[key]["cname"]] = marker;
               marker.content = json[key]["cname"] ;
                              marker.Mid = json[key]["cname"] ;


var infoWindow = new google.maps.InfoWindow();
google.maps.event.addListener(marker, 'click', function () {
                                infoWindow.setContent(this.content);
                                infoWindow.open(this.getMap(), this);
                                

                            });
                            google.maps.event.addListener(marker, 'click', function() {
                            
                            map.panTo(this.getPosition());
                            }); 
                
               infoWindows.push(infoWindow); 
       markers.push(marker);
      
    }
  }
             map.fitBounds(bounds); 
                    document.getElementById("list").style.overflowY = "scroll"

            
         if ($('#selectiona').length) {

var audio = document.getElementById("audio2");
       audio.play();
}

            }
            });
            }
    
    
    
}



// The map on the page is initialized and loaded here when a user visits the Find mY Court Website 

      function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }


          function showPosition(position) {
             window.lat= position.coords.latitude;
              window.lon= position.coords.longitude;
             $('.btnfmcfind').first().css('display', 'block'); 

        console.log(window.lat);
       window.directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
       window.directionsService = new google.maps.DirectionsService;
     

       
        var uluru = new google.maps.LatLng(window.lat, window.lon);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru,

        });
         
        window.map=map;

              
          }




      }
      
      
  
    </script>
    <!-- The script below link us with a Jquery source file to enable the Jquery script on the page to run. AJAX cannot run with this linked file -->

    <script type="text/javascript" src="jqueryx.min.js"></script>
    
    
<!-- The script below displays a location on the map. When results have been output after the 'find nearest court button has been clicked, a user can click a court name and this will be displayed on the map -->

<script type="text/javascript">


$('.plname').live("click",function() 
{
directionsDisplay.setDirections({routes: []});
var getId = $(this).attr("id");
var xxxh =  window['mar' + getId];
  document.getElementById("map").style.width = "50%";
    document.getElementById("map").style.right = "30%";


      document.getElementById("panel").style.width = "30%";
      $.get('comment.php?CourtName='+ $(this).attr("data-name") + '&CourtID=' + $(this).attr("data-id") ,
        function(data){
          document.getElementById("panel").innerHTML = data;
        });
    window.currCenter = map.getCenter();
  google.maps.event.trigger(map, 'resize');
map.setCenter(currCenter);


google.maps.event.trigger(xxxh, 'click', function() {
      console.log(xxxh);                      
                            
                            });
        
      map.setZoom(14);                       



});

 // The script .live function below displays the rout to a court once a court image has been clicked

$('.thumb').live("click",function() 
{


window.getIdz = $(this).attr("id");
var getId4 = $(this).attr("data-lat");
var getId5 = $(this).attr("data-lon");
for (var i=0;i<infoWindows.length;i++) {
     infoWindows[i].close();
  }
//var zert=new google.maps.LatLng(lat, lon);
var zert=new google.maps.LatLng(-37.8443, 145.1100);


 for (var i = 0; i < markers.length; i++) {
            if (markers[i].Mid == getIdz) {
window.latdest = markers[i].getPosition().lat();
window.londest = markers[i].getPosition().lng();

            }
        }
window.mexdie=new google.maps.LatLng(latdest, londest);


  window.request = {
    origin:zert,
    destination:mexdie,
    travelMode: 'DRIVING'
  };
  directionsService.route(request, function(response, status) {
    if (status == 'OK') {

                        directionsDisplay.setMap(map);
                        directionsDisplay.setDirections(response);
  document.getElementById("map").style.width = "50%";
  document.getElementById("map").style.right = "20%";
    document.getElementById("panel").style.width = "20%";
            directionsDisplay.setPanel(document.getElementById('panel'));


  window.currCenter = map.getCenter();
  google.maps.event.trigger(map, 'resize');
map.setCenter(currCenter);


    } else{
    
    alert('Sorry, there are no courts near you');
    }
  });


});



</script>
<!-- The script below is executed once the home link is clicked and output the homepage -->

<script type="text/javascript">
$(function() {

$('#homebtn').live("click",function() 
{
if(1==1)
{
$("#homebtn").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  
var audio = document.getElementById("audio");
       audio.play();
$.ajax({
type: "POST",
url: "a.php",
cache: false,
success: function(html){

$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();
$("#mainsel").append(html);
$("#homebtn").html('HOME'); 

 

uluru = {lat: -25.363, lng: 131.044};
    map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru,
        });
         
        window.map=map;

if($('.btnfmcfind').css('display') == 'none')
{
$('.btnfmcfind').first().css('display', 'block'); 
}



}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>

<!-- The script below is executed once the contact link is clicked and output the contacts page -->

<script type="text/javascript">
$(function() {

$('#contactbtn').live("click",function() 
{
if(1==1)
{
$("#contactbtn").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  
var audio = document.getElementById("audio");
       audio.play();
$.ajax({
type: "POST",
url: "b.php",
cache: false,
success: function(html){

$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();

$("#mainsel").append(html);
$("#contactbtn").html('CONTACT US');  



}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>

<!-- The script below is executed once the account link is clicked and output the account page -->

<script type="text/javascript">
$(function() {

$('#accbtn').live("click",function() 
{
if(1==1)
{
$("#accbtn").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  
var audio = document.getElementById("audio");
       audio.play();
$.ajax({
type: "POST",
url: "h.php",
cache: false,
success: function(html){

$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();
$("#accbtn").html('ACCOUNT');  

$("#mainsel").append(html);

}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>


<script type="text/javascript">
$(function() {

$("#helpbtn").live("click",function() 
{
if(1==1)
{
$("#helpbtn").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>'); 
var audio = document.getElementById("audio");
       audio.play(); 
$.ajax({
type: "POST",
url: "d.php",
cache: false,
success: function(html){


$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();
$('.btnfmcfind').first().css('display', 'block'); 
$("#mainsel").append(html);
$("#helpbtn").html('FAQs');  


}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>


<!-- The script below is executed once the submit button is clicked during sign up process -->

<script type="text/javascript">
$(function() {

$(".submitsign2").live("click",function() 
{
if(1==1)
{
var usr=$('#usr').val();
var fn=$('#fn').val();
var ln=$('#ln').val();
var em=$('#em').val();
var pass=$('#pass').val();
var coda=$('#coda').text();

document.getElementById('close2').style.display='none';
$(".submitsign2").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>'); 
if( usr && fn && ln && validateEmail(em) && pass && coda){
$.ajax({
type: "POST",
url: "f.php",
cache: false,
data: "usr="+usr+"&fn="+fn+"&ln="+ln+"&em="+em+"&pass="+pass+"&coda="+coda, 
dataType: 'json',
success: function(data){

if(data.a=='good'){
$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();
$("#mainsel").html(data.b);
$("#hjjh").append(data.c);
$(".submitsign2").html('Sign Up'); 
document.getElementById('sharep2').style.display='none';
document.getElementById('fade2').style.display='none';
document.getElementById('logoutx').style.display='block';
document.getElementById('exes').style.display='none';
document.getElementById('xoxo').style.display='none';
document.getElementById('hjjh').style.display='block';

$("#hjjh").append('&nbsp;&nbsp;Hey '+usr); 
$('.tetea').first().css('display', 'inline-block'); 
document.getElementById('close2').style.display='block';

} 



}
});
} else{

$(".submitsign2").html('Try again'); 
document.getElementById('close2').style.display='block';


}
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>
<!-- The script below is executed once the sign in button is clicked during  sign in process -->

<script type="text/javascript">
$(function() {

$("#login").live("click",function() 
{
if(1==1)
{

var em=$('#em2').val();
var pass=$('#pass2').val();
var coda=$('#coda').text();
document.getElementById('close').style.display='none';
$("#login").html('Loading'); 


$.ajax({
type: "POST",
url: "g.php",
cache: false,
data: "em="+em+"&pass="+pass+"&coda="+coda, 
dataType: 'json',
success: function(data){
  console.log(data);
if(data.a=='good'){
$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();
$("#mainsel").html(data.b);
$("#hjjh").append(data.c);
document.getElementById('sharep').style.display='none';
document.getElementById('fade').style.display='none';
document.getElementById('close').style.display='block';
document.getElementById('logoutx').style.display='block';
document.getElementById('exes').style.display='none';
document.getElementById('xoxo').style.display='none';
document.getElementById('close').style.display='none';
document.getElementById('hjjh').style.display='block';
$("#hjjh").append('&nbsp;&nbsp;Hey '+em); 
$("#login").html('Sign In'); 
$('.tetea').first().css('display', 'inline-block'); 






} else {

$(".loginb").html('Try again'); 
document.getElementById('close').style.display='block';


}
}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

// The code below is executed when the page is loaded to determine if a user is currently logged in

var php_var = "<?php echo isset($_SESSION['user'])?$_SESSION['user']:""; ?>";
if(php_var){
document.getElementById('logoutx').style.display='block';
document.getElementById('exes').style.display='none';
document.getElementById('xoxo').style.display='none';
document.getElementById('hjjh').style.display='block';
document.getElementById('ttt').style.display='inline-block';

var delay = 1500;
setTimeout(function() {
var coda=$('#coda').text();

$("#hjjh").append('<object width="30" style="position:absolute; left:-30px; top:50%; transform:translateY(-50%);" data="4x3/'+coda+'.svg" type="image/svg+xml"></object>'+'&nbsp;&nbsp;Hey '+php_var);
$('.menucont').first().css('display', 'inline-block'); 
 
}, delay);
} else{
$('.menucont').first().css('display', 'inline-block'); 
}
</script>

<!-- The script below is executed once the log out button is clicked if a user wishes to log out -->


<script type="text/javascript">
$(function() {

$("#logoutx").live("click",function() 
{
if(1==1)
{

$("#logoutx").html('Loading'); 

$.ajax({
type: "POST",
url: "logout.php",
cache: false,
success: function(html){
$("#selectiona").remove();
$("#selectionb").remove();
$("#selectionc").remove();
$("#selectiond").remove();
$("#selectionh").remove();
document.getElementById('logoutx').style.display='none';
document.getElementById('exes').style.display='block';
document.getElementById('xoxo').style.display='block';
document.getElementById('hjjh').style.display='none';
$("#hjjh").html(''); 
$("#logoutx").html('LOG OUT'); 
$('.tetea').first().css('display', 'none'); 
$("#mainsel").append(html);

uluru = {lat: -25.363, lng: 131.044};
    map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru,
        });
         
        window.map=map;


}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>

<!-- The script below is executed once the add location button is clicked during add new location process -->

</script>
<script type="text/javascript">
$(function() {

$('#addloc').live("click",function() 
{
if(1==1)
{
var ln=$('#lna').val();
var ld=$('#lda').val();
var lat=$('#lat').text();
var lng=$('#lng').text();
var usr=$('#codaname').text();

$("#addloc").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  

$.ajax({
type: "POST",
url: "i.php",
cache: false,
data: "ln="+ln+"&ld="+ld+"&lat="+lat+"&lng="+lng+"&usr="+usr, 
dataType: 'json',
success: function(data){
if(data.a=='good'){
$("#addloc").html('Success!'); 


} else
{
$("#addloc").html('Try again'); 

}


}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>

<!-- The script below is executed once the add new court button is clicked during add new court process -->

<script type="text/javascript">
$(function() {

$('#addcourt').live("click",function() 
{
if(1==1)
{
var cna=$('#cna').val();
var cda=$('#cda').val();
var idloc=$('#loccou').val();
var bbt=$('#bbt').val();
var net=$('#net').val();
var scoreb=$('#scoreb').val();
var cty=$('#cty').val();
var ind=$('#ind').val();
var usr=$('#codaname').text();


$("#addcourt").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  

$.ajax({
type: "POST",
url: "j.php",
cache: false,
data: "cna="+cna+"&cda="+cda+"&idloc="+idloc+"&bbt="+bbt+"&net="+net+"&scoreb="+scoreb+"&cty="+cty+"&ind="+ind+"&usr="+usr, 
dataType: 'json',
success: function(data){
if(data.a=='good'){

$("#addcourt").html('Success!'); 


} else
{
$("#addcourt").html('Try again'); 

}


}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});


function fade_out() {
  $("#submitenq").fadeOut().empty();
}


</script>
<script type="text/javascript">
$(function() {

$('#submitenq').live("click",function() 
{
if(1==1)
{
$("#submitenq").html('<img src="loader.gif" height="20" width="20" style="padding:0px 0px 0 0px; background-image:none; margin:0px 0px 0 0px;"/>');  


var cna2=$('#usrnmeinq').val();
var cda2=$('#emailinq').val();
var idloc2=$('#subinq').val();
var bbt2=$('#mezinq').val();
alert(cda2);
$.ajax({
type: "POST",
url: "k.php",
cache: false,
data: "cna2="+cna2+"&cda2="+cda2+"&idloc2="+idloc2+"&bbt2="+bbt2,
success: function(html){


$("#submitenq").html('SENT!');  

}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>

<!-- Below are link to audio / sound used by the page -->

<audio id="audio" src="bounce.wav" ></audio>
<audio id="audio2" src="swish.wav" ></audio>

<!-- The code directly below is the Google API link with a user's key. Maps cannot be used without this-->

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDij_l_eJVZTNPl0__TL2kzjY3u4hI1r1k&callback=initMap">
    </script>
</body>
</html>