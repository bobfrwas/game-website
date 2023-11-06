
<?php
$tier1Price = 5.99;
$tier2Price = 9.99;




$signUpDate = strtotime('2023-10-01');
$billingDate = strtotime('+31 days', $signUpDate);

$tierChangeDate = strtotime('+17 days', $signUpDate);

$tier1Days = min($tierChangeDate, $billingDate) - $signUpDate;
$tier2Days = $billingDate - min($tierChangeDate, $billingDate);

$firstBill = ($tier1Price * $tier1Days / (60*60*24)) + ($tier2Price * $tier2Days / (60*60*24));

$formattedBill = number_format($firstBill, 2);

echo "Your first bill amount is £$formattedBill.";
?>