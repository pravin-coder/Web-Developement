<!DOCTYPE html>
<html>
<head>
    <title>Candidate List</title>
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

table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #ffffff;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

thead {
    background-color: purple;
    color: white;
}

/* Style for table rows on hover */
tbody tr:hover {
    background-color: #f2f2f2;
}

	</style>
</head>
<body>
<?php
// Database connection details
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = "";
$dbName = 'votingdb';
$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$query = "SELECT user_id,username,email,phone_num,status FROM users";
$result = $connection->query($query);
$voters = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $voters[] = $row;
    }
}
$connection->close();
?>

    <h1>List Of Voters</h1>
    <table>
        <thead>
            <tr>
                <th>USER-ID</th>
                <th>USERNAME</th>
                <th>EMAIL-ID</th>
				<th>PHONE-NUMBER</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voters as $voters) { ?>
                <tr>
                    <td><?php echo $voters['user_id']; ?></td>
                    <td><?php echo $voters['username']; ?></td>
                    <td><?php echo $voters['email']; ?></td>
                    <td><?php echo $voters['phone_num']; ?></td>
					<td><?php echo $voters['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
