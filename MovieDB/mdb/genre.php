<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>Genre</title>
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	 <link rel="stylesheet" href="css/table.css" type="text/css" />
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
					<th><h1>Movie</h1></th>
					<th><h1>Genre</h1></th>
				</tr>
<?php
	$sql = "SELECT Title,Genre FROM genre,movie WHERE genre.Movie_id = movie.Movie_id";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		echo"<tr><td>".$row['Title']."</td><td>".$row['Genre']."</td></tr>";
    }
} 
else {
    echo "0 results";
}

?>
			</table>
	     </body>
</html>