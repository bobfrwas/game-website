<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Combined Form</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="animate.css-main/animate.css">

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
      }

      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .form-wrapper {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 40px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
      }

      h2 {
        text-align: center;
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 20px;
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #cccccc;
        border-radius: 4px;
      }

      button[type="submit"] {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
      }

      button[type="submit"]:hover {
        background-color: #0056b3;
      }

      p {
        text-align: center;
        margin-top: 20px;
      }

      a {
        color: #007bff;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="form-wrapper">
            <h2>Collect User Data</h2>
            <form action="basic_handleform.php" method="post">
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" size="20" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" size="20" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" id="age" name="age" size="2" maxlength="3" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" size="20" max_length="40" required>
                </div>
                <div class="form-group```
                    <label for="housenumber">House number:</label>
                    <input type="text" id="housenumber" name="housenumber" size="2" maxlength="4" required>
                </div>
                <div class="form-group">
                    <label for="streetname">Street name:</label>
                    <input type="text" id="streetname" name="streetname" size="20" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="town">Town:</label>
                    <input type="text" id="town" name="town" size="20" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="county">County:</label>
                    <input type="text" id="county" name="county" size="20" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" size="20" maxlength="9" required>
                </div>
                <button type="submit">Submit My Details</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, '@') !== false) {
            echo "Valid email format";
        } else {
            echo "Invalid email format";
        }
    }
    ?>
</body>
</html>