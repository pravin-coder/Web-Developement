<!DOCTYPE html>
<html>
<head>
<style>
.list {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: white;
    max-width: 300px;
    height: 100vh;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    justify-content: center;
}

.id {
     align-items: top;
    background-color: purple;
	color:white;
    font-family: "Algerian";
    font-size: 20pt;
	max-width:300px;
}
.note {
    background-color: white;
	max-width:200px;
	font-weight:bold;
    font-family: "courier";
    font-size: 10pt;
	
    padding: 10px;
    margin: 0; /* Add this to remove margin */
}
ul.menu {
    list-style-type: none;
    padding: 0;
    text-align: center; /* Center the menu items */
}

ul.menu li {
    margin: 5px;
}

ul.menu button {
    color: purple;
    font-family: "Times New Roman";
    font-size: 15pt;
    cursor: pointer;
    width: 100%;
    background-color: white;
    border: none;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius: 5px;
    padding: 10px;
    margin: 5px;
}

ul.menu button:hover {
    background-color: grey;
}

.fscreen {
    height: 100vh;
    display: flex;
    flex-direction: row;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.left {
    flex: 3;
    background-color: #f2f2f2;
}

.right {
    flex: 7;
    padding: 3px;
    background-color:white;
    height: 100vh;
    margin: none;
}

/* Style for iframe container */
iframe {
    width: 100%;
    height: 100%;
    border: none;
}
</style>
</head>
<body>
<div class="fscreen">
    <div class="left">
        <div class="list">
            <marquee class="id">WELCOME TO THE VOTING PORTAL</marquee>
			<p class="note">here are few options you can select</p>
            <ul class="menu">
                <li><button onclick="loadPage('candidate.html')">Candidate Details</button></li>
                <li><button onclick="loadPage('vote.php')">Vote Candidate</button></li>
                <li><button onclick="loadPage('news.html')">News</button></li>
                <li><button onclick="loadPage('profile.php')">Profile</button></li>
            </ul>
        </div>
    </div>
    <div class="right">

        <iframe name="right"></iframe>
    </div>
</div>
<script>
function loadPage(page) {
    document.querySelector('iframe[name="right"]').src = page;
}
</script>
</body>
</html>
