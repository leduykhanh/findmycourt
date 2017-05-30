<?php
$e=$_POST['cda2'];
$nm=$_POST['cna2'];
$sub=$_POST['idloc2'];

$to      = $e; // Send email to our user
$subject = $sub.'| Find My Court'; // Give the email a subject 
$message = '
Dear '.$nm.'
Thanks for contact us!

You query will be forwarded to appropraite department and we will get back to you shortly.
 
Kind regards,
Rachel Callahan
 
'; // Our message above including the link
                     
$headers = 'From:findmycourt@starsvillage.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email



?>
