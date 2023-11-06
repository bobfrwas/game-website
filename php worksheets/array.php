<!DOCTYPE html> <html> <head> <title>Using Echo</title> </head> <body> <!--This is an HTML comment --> 
<p>This is standard HTML</p> 
<?php 

$numbers = array("10", "20", "30", "40", "50");
$len = count($numbers);
$sum = $numbers[0] + $numbers[$len - 1];
echo $sum;





?> 
</body> 
<html>