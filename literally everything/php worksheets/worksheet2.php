<!DOCTYPE html> <html> <head> <title>Using Echo</title> </head> <body> <!--This is an HTML comment --> 
<p>This is standard HTML</p> 
<?php 

$firstname = "Bob";
$surname = "Mellow";
$fullname = $firstname .' '. $surname;

echo "Hello <strong> $firstname </strong> $surname <br /> $fullname";

?> 
</body> 
<html>