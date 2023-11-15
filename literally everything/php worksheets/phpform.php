<!DOCTYPE html>
<html>
<head>
    <title>Collect User Data</title>
</head>
<body>
    <p>Please enter the following details:</p>
    <form action="handle-form.php" method="post">
        <p>
            <label>Name:</label>
            <input type="text" name="name" size="20" maxlength="40">
        </p>
        <p>
            <label>Age:</label>
            <input type="text" name="age" size="2" maxlength="3">
        </p>
         <label>Email:</label>
         <input type="text" name="email" size="20" max_length="40">
        <p>
            <input type="submit" value="Submit My Details">
        </p>
    </form>
</body>
</html>