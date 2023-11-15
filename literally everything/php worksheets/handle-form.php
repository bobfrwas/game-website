<!DOCTYPE html>
<html>
<head>
    <title>Details Accepted</title>
</head>
<body>
    <p>Thank you for submitting the following information:</p>
    <?php
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    echo "Thanks $name who is $age We will contact you with information at your email $email";
    var_dump($name); 
    echo '<br>Have a good day.<hr>';
    ?>
</body>
</html>