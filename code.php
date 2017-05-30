<?php
session_start();
$code=$_POST['coucode'];
?>
<!--There code here produces a div with the user's country code and a seconde div with the user's username -->

<div class="invisible" id="coda"><?php echo $code; ?></div>
<div class="invisiblename" id="codaname"><?php echo $_SESSION['user']; ?></div>
<?php

?>