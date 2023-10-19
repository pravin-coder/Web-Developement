<!DOCTYPE html>
<html>
<head>
    <title>Candidate Registration Form</title>
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
    margin: 20px 0;
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

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="hidden"] {
    display: none; /* Hidden input for the default votes */
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
input[type="text"]:focus {
    border: 2px solid purple;
}

/* Add a bit of spacing between the form elements */
form > * {
    margin-bottom: 10px;
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
$candidate_id = $_POST['candidate_id'];
$name = $_POST['name'];
$party = $_POST['party'];
$votes = $_POST['votes'];
$query = "INSERT INTO candidates (id, name, party, votes) VALUES (?, ?, ?, ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssi", $candidate_id, $name, $party, $votes);

if ($stmt->execute()) {
    echo "Candidate registration successful. Data has been inserted into the database.";
} else {
    echo "Candidate registration failed. Error: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$connection->close();
}
?>

    <h1>Candidate Registration</h1>
    <form action="ccandid.php" method="post">
        <label for="candidate_id">Candidate ID:</label>
        <input type="text" name="candidate_id" id="candidate_id" required><br><br>
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="party">Party Name:</label>
        <input type="text" name="party" id="party" required><br><br>
        
        <input type="hidden" name="votes" value="0">
        
        <input type="submit" value="Register Candidate">
    </form>
</body>
</html>
