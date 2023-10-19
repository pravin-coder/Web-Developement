<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .login-box {
            width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 30px;
        }

        h2 {
            text-align: center;
        }

        .input-group {
            margin: 10px 0;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group button {
            width: 50%;
            padding: 10px;
            background-color: purple;
            color: #fff;
        }

        .input-group button:hover {
            background-color: grey;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "votingdb";
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
	$username = $_POST['username'];
    $password = $_POST['password'];
    // Check if the provided credentials match "admin"
    if ($username === 'admin' && $password === 'admin') {
        echo '<script>window.open("admin.php", "topsection");</script>';
    } 
	else {
        $sql = "SELECT username, password ,email,adress,phone_num FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $dbuname = $row['username'];
            $dbupass = $row['password'];	
			$dbuemail= $row['email'];
			$dbuaddress=$row['adress'];
			$dbuphone=$row['phone_num'];
			session_start();
			$_SESSION['v1'] = $dbuname ;
			$_SESSION['v2'] = $dbupass ;
			$_SESSION['v3'] = $dbuemail ;
			$_SESSION['v4'] = $dbuaddress ;
			$_SESSION['v5'] = $dbuphone ;
			
        if (($username==$dbuname)&&($password==$dbupass)){
            echo '<script>window.open("user_home.php", "topsection");</script>';
            exit();			
 
        } else {
            die("User not found");
        }
    }}
	else {
        die("Query failed: " . mysqli_error($conn));
    }
	}
    mysqli_close($conn);
}
?>

    <div class="login-box">
        <h2>Login</h2>
		<hr><br><br>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" size="10" required>
            </div><br>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div><br>
            <div class="input-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
