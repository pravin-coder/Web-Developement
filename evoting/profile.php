<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

header {
    color: purple;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #ffffff;
}

.content {
    background-color: #ffffff;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
}

.content h2 {
    color: purple;
}
content h3 {
	text-align:center;
}

</style>
</head>
<body>
    <?php 
    session_start(); 
    $uname = $_SESSION['v1'];
    $upass = $_SESSION['v2'];
    $umail = $_SESSION['v3'];
    $uadress = $_SESSION['v4'];      
    $uphone = $_SESSION['v5'];
    ?>
    <header>
        <h1>Profile</h1>
        </nav>
    </header>

    <section class="content">
        <h2>NAME:</h2>
        <h3> <?php echo $uname; ?>    </h3>
    </section>

    <section class="content">
        <h2>Password:</h2>
        <h3><?php echo $upass; ?></h3>
    </section>
	 <section class="content">
        <h2>E-mail:</h2>
        <h3> <?php echo $umail; ?></h3>
    </section>
	<section class="content">
        <h2>Address:</h2>
        <h3><?php echo $uadress; ?></h3>
    </section>
	<section class="content">
        <h2>Phone Number:</h2>
        <h3><?php echo $uphone; ?></h3>
    </section>
</body>
</html>
