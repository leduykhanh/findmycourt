<?
session_start();

// The php code below is executed when a user wishes to log out

// The unset methods nullify an data inside the $_SESSION objects
 unset($_SESSION['user']);
 unset($_SESSION['fmcuser']);
 
?>

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
                        <button class="btnfmcfind" id="test" onclick="getLocation()">FIND NEAREST COURT</button>
                        </div>
                        </div>

                        </div>
<?php

?>