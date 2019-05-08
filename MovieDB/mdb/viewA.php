
<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>All actors</title>
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	 <link rel="stylesheet" href="css/table.css" type="text/css" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <style>
	 a{
	
	text-decoration:none;
	color:#blue;
	
	
}
.btn {
    background-color: #1F2739;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}
	 </style>
	 <script type="text/javascript">
	     function active(){
			 var searchBar = document.getElementById('searchBar');
			 if(searchBar.value == 'Search a movie...'){
				 searchBar.value = ''
				 searchBar.placeholder='Search a movie...'
			 }
		 }
	 </script>
	 </head>
	     <body>
		 <div id="gradient"></div>
	         <header>
		       <h1><a href="main.php">Movie Database</a></h1>
             </header></br>
			 <ul>
			   <li><a>MOVIES</a>
				   <ul>
					<li><a href="viewM.php">View all movies</a></li>
					<li><a href="addM.php">Add a movie</a></li>
				   </ul>
			   </li>
			   <li><a>DIRECTOR</a>
					<ul>
					<li><a href="viewD.php">View all directors</a></li>
					<li><a href="addD.php">Add a director</a></li>
					</ul>
			   </li>
			   <li><a>ACTOR</a>
					<ul>
					<li><a href="viewA.php">View all actors</a></li>
					<li><a href="addA.php">Add an actor</a></li>
					</ul>
			   </li>
			   <li><a href="genre.php">GENRE</a></li>
			   <li><a href="sales.php">SALES</a></li>
			   <li><a href="log.php">LOGS</a></li>
			 </ul>
		 	<form class="srch" method="POST" action="srch.php">
				<input name="search" type="text" id="searchBar" placeHolder="" value="Search a movie..." onMouseDown="active()"; /><input type="submit" name="submit" id="searchBtn" value="GO!"; />
			</form> 
			<br><br><br><br>
			<table class="tab">
				<tr>
					<th><h1>ID</h1></th>
					<th><h1>Name</h1></th>
					<th><h1>Role</h1></th>
					<th><h1>Sex</h1></th>
					<th><h1>DOB</h1></th>
					<th><h1> </h1></th>
				</tr>
				
<?php
	$servername = "localhost";
	$username ="root";
	$password = "";
	$db = "moviedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM actors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		echo"<tr><td>$row[A_id]</td><td>$row[A_name]</td><td>$row[Role]</td><td>$row[Sex]</td><td>$row[DOB]</td><td>
		<a href='editA.php?A_id=$row[A_id]&A_name=$row[A_name]&Role=$row[Role]&Sex=$row[Sex]&DOB=$row[DOB]'><button class='btn'><i class='fa fa-cog fa-spin'></i> Edit</button></a>
		<a href='deleteA.php?A_id=$row[A_id]'><button class='btn'><i class='fa fa-trash'></i> Delete</button></a></td></tr>";
    }
} 
else {
    echo "0 results";
}
$conn->close();
?>
		 </table>
	     </body>
</html>
