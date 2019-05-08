<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>Movie Database</title>
	 <link rel="stylesheet" href="css/zz.css" type="text/css" />
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
			   
			 </ul>
		 	<form class="srch" action="search.php" method="post">
				<input type="text" id="searchBar" placeHolder="" value="Search a movie..." onMouseDown="active()"; /><input type="submit" id="searchBtn" value="GO!"; />
			</form> 
			<li><h2><a href="log.php">LOGS</a><h2></li>
			
	     </body>
</html>
