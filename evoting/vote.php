<!DOCTYPE html>
<html>
<head>
    <title>Vote for Candidates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        h1 {
            color: purple;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }

        button {
            background-color: purple;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Vote for Your Favorite Candidate</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul>
            <?php
            // Connect to the database (replace with your database connection code)
            $db = new mysqli("localhost", "root", "", "votingdb");
            if ($db->connect_error) {
                die('Connection failed: ' . $db->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["candidate_id"])) {
                $candidateId = $_POST["candidate_id"];

                // Update the vote count for the selected candidate
                $updateQuery = "UPDATE candidates SET votes = votes + 1 WHERE id = ?";
                $stmt = $db->prepare($updateQuery);
                $stmt->bind_param("i", $candidateId);

                if ($stmt->execute()) {
                    echo 'Vote submitted successfully.';
                } else {
                    echo 'Failed to submit the vote.';
                }

                $stmt->close();
            }

            $query = "SELECT * FROM candidates";
            $result = $db->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li>' . $row['name'] . '<button name="candidate_id" value="' . $row['id'] . '">Vote</button></li>';
                }
            } else {
                echo 'No candidates found.';
            }
            $db->close();
            ?>
        </ul>
        <input type="submit" value="Submit Vote">
    </form>
</body>
</html>
