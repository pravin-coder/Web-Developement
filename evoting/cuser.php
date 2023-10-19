<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
	<style>
	/* Reset some default browser styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

/* Center the content on the page */
h1 {
    text-align: center;
    color: purple;
}

form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the form labels and inputs */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
}

input[type="text"],
input[type="password"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    height: 100px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: purple;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Style input fields when in focus */
input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
textarea:focus {
    border: 2px solid purple;
}

form > * {
    margin-bottom: 10px;
}

.error {
    color: red;
    margin-top: 5px;
}
</style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = "";
$dbName = 'votingdb';
$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password =$_POST['password'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$status="no";
$sql1 = "INSERT INTO users (user_id, username, password, email, adress, phone_num,status) VALUES ( '$user_id', '$username', '$password', '$email', '$address', '$phone', '$status');";
$res=mysqli_query($connection,$sql1);

if ($res) {
    echo "Registration successful. Data has been inserted into the database.";
} else {
    echo "Registration failed. Error: ";
}

$connection->close();
}

?>

    <h1>User Registration</h1>
    <form action="cuser.php" method="post">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Create Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="address">Address:</label>
        <textarea name="address" id="address" required></textarea><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
