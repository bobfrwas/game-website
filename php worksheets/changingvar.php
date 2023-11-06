<!DOCTYPE html> <html> <head> <title>Using Echo</title> </head> <body> <!--This is an HTML comment --> 
<p>This is standard HTML</p> 
<?php 

$firstnum = "1";
$secondnum = "2";

$firstnum = $firstnum + $secondnum;
$secondnum = $firstnum - $secondnum;
$firstnum = $firstnum - $secondnum;



echo "First num was one and is now $firstnum and second num started off as 2 and is now $secondnum";

?> 
</body> 
<html>