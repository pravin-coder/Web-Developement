<html>
<head>
<style>
.list{
    background-color:purple;
	color:white;
	padding:5px;
	text-align:center;
	}
 ul.menu{
   display:inline;
   text-decoration:none;
   }
 ul.menu li{
   display:inline;
   margin:5px;
   }
ul.menu a{
    color: white;
    font-family: "Times New Roman";
    font-weight: bold;
    font-size: 20pt;
    text-decoration: none;
	}
.topsection{
 flex:3;
 background-color:white;
 }
.bottom{
 flex:10;
 }
 </style>
</head>
<body>
<div class="fullscreen">
<div class="topsection">
<center>
	<div class="list">
	<ul class="menu">
	<li><a href="cuser.php" target="bleft">Create New User</a></li>&nbsp;&nbsp;
    <li><a href="vlist.php" target="bleft">Generate Voter List </a></li>&nbsp;&nbsp;
    <li><a href="gcandid.php" target="bleft">Generate Candidate List</a></li>&nbsp;&nbsp;
	<li><a href="ccandid.php" target="bleft">Add Candidate</a></li>&nbsp;&nbsp;
    </ul>
	</div>
</div>
<div class="bottom">
   <iframe name="bleft" style="width: 100%; height: 100%;" ></iframe>
   </div>
</div>
<footer>
     <center>   <p>&copy; 2023 My eVoting. All rights reserved.</p></center>
    </footer>
</body>
</html>





