
<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>Search</title>
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	  <link rel="stylesheet" href="css/table.css" type="text/css" />
	  <style>
	   a{
	
	text-decoration:none;
	
	
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
		       <h1 data-text="Movie Database"><a href="main.php">Movie Database</a></h1>
             </header></br>
			 <div class="tab2">
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
			 </div>
		 	<form class="srch" method="POST" action="srch.php">
				<input name="search" type="text" id="searchBar" placeHolder="" value="Search a movie..." onMouseDown="active()"; /><input type="submit" name="submit" id="searchBtn" value="GO!"; />
			</form> 
			<table class="tab">
				<tr>
					
					<th><h1>Title</h1></th>
					<th><h1>Year</h1></th>
					<th><h1>Company</h1></th>
					<th><h1>Rating</h1></th>
					<th><h1>Action</h1></th>
					</tr>
					<br><br>
<?php 

	if (isset($_POST['submit'])){
		$mysqli = NEW MySQLi("localhost","root","","moviedb");
		
		$search= $mysqli->real_escape_string($_POST['search']);
		
		$resultSet = $mysqli->query("SELECT * FROM movie WHERE Title LIKE '$search%' OR Year LIKE '$search%' OR Rating LIKE '$search%'");
		$num_rows = mysqli_num_rows($resultSet);
		if($resultSet->num_rows > 0){
			echo"<p style='color:white; font-size:25px;'>showing $num_rows result(s):</p><br>";
			while($rows = $resultSet->fetch_assoc()){
				
				echo"<tr><td>$rows[Title]</td><td>$rows[Year]</td><td>$rows[Company]</td><td>$rows[Rating]</td><td>
	<a href='editM.php?Movie_id=$rows[Movie_id]&Title=$rows[Title]&Year=$rows[Year]&Company=$rows[Company]&Rating=$rows[Rating]&D_id=$rows[D_id]&A_id=$rows[A_id]'>Edit</a>
	<a href='deleteM.php?Movie_id=$rows[Movie_id]'><span style='color:red;'>Delete</span></a>
	<a href='comment.php?Movie_id=$rows[Movie_id]'>Comment</a></td><td>
	<a href='cast.php?Movie_id=$rows[Movie_id]&A_id=$rows[A_id]&D_id=$rows[D_id]'><span style='color:green;'>MoreInfo</span></a></td></tr>";
				
			}
		}else{
			 echo "No results";
		}
	}
 ?>
 </table>
    </body>
</html>

