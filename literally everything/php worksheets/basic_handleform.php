<!DOCTYPE html>
<html>
<head>
    <title>Details Accepted</title>
</head>
<body>
    <p>Thank you for submitting the following information:</p>
    <?php
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $housenumber = $_POST['housenumber'];
    $streetname = $_POST['streetname'];
    $town = $_POST['town'];
    $county = $_POST['county'];
    $postcode = $_POST['postcode'];

    echo "Your information is <br /> Name: $firstname $surname <br /> You are $age years old <br /> Your email is $email <br /> Your housenumber is $housenumber <br /> your streetname is $streetname <br /> Your town is $town <br /> You live in $county <br /> your postcode is $postcode";



    echo '<br>Have a good day.<hr>';
    ?>
</body>
</html>