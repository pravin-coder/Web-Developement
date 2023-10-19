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
$query = "SELECT * FROM candidates";
$result = $connection->query($query);
$candidates = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $candidates[] = $row;
    }
}
$connection->close();
?>

    <h1>Candidate List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Party</th>
                <th>Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate) { ?>
                <tr>
                    <td><?php echo $candidate['id']; ?></td>
                    <td><?php echo $candidate['name']; ?></td>
                    <td><?php echo $candidate['party']; ?></td>
                    <td><?php echo $candidate['votes']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
