<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>More</title>
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	 <link rel="stylesheet" href="css/table.css" type="text/css" />
	 <style>
		.direc {
    position: absolute;
    left: 690px;
    top: 542px;
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
			 </ul>
		 	<form class="srch" method="POST" action="srch.php">
				<input name="search" type="text" id="searchBar" placeHolder="" value="Search a movie..." onMouseDown="active()"; /><input type="submit" name="submit" id="searchBtn" value="GO!"; />
			</form> 
			<br><br>
			
			
<?php
	
	if(isset($_GET['Movie_id'])){
		
		$Movie_id  = $_GET['Movie_id'];
		$sql = "SELECT * FROM sales 
				WHERE Movie_id ='$Movie_id'";
				
			
			
			$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($ro = $result->fetch_assoc()) {
        
		echo"$ro[Movie_id]<br><span style='color:yellow; font-size:30px;'>Income:</span><span>  </span><span style='color:red; font-size:24px;'>$ro[TotalIncome]</span><br><br>";
    }
} 
else {
    echo "<p style='color:red; font-size:24px;'>not added</p>";
}
}
?>	
<?php
	
	if(isset($_GET['Movie_id'])){
		
		$Movie_id  = $_GET['Movie_id'];
		$sql = "SELECT * FROM genre 
				WHERE Movie_id ='$Movie_id'";
				
			
			
			$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($ro = $result->fetch_assoc()) {
        
		echo"<span style='color:yellow; font-size:30px;'>Genre:</span><span>  </span><span style='color:red; font-size:24px;'>$ro[Genre]</span><br><br>";
    }
} 
else {
    echo "<p style='color:red; font-size:24px;'>not added</p>";
}
}
?>			
			
			
			<p style='color:yellow; font-size:34px;'>Cast:</p><br>
<?php
	
	if(isset($_GET['A_id'])){
		
		$A_id  = $_GET['A_id'];
		$sql = "SELECT * FROM actors 
				WHERE A_id ='$A_id'";
				
			
			
			$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($ro = $result->fetch_assoc()) {
        
		echo"<h3>Actor name:</h3><br><strong><p style='color:blue; font-size:24px;'>$ro[A_name]</p></strong><br><h3>Role:</h3><p style='color:blue; font-size:24px;'>$ro[Role]</p><br>
			 <h3>Sex:</h3><p style='color:blue; font-size:24px;'>$ro[Sex]</p><br><h3>DOB:</h3><p style='color:blue; font-size:24px;'>$ro[DOB]</p><br><br><br>";
    }
} 
else {
    echo "<p style='color:blue; font-size:24px;'>no info</p>";
}
}
?>

<div class="direc" >
<?php
	
	if(isset($_GET['D_id'])){
		
		$D_id  = $_GET['D_id'];
		$sql = "SELECT * FROM directors 
				WHERE D_id ='$D_id'";
				
			
			
			$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($ro = $result->fetch_assoc()) {
        
		echo"<h3>Director by:</h3><br><p style='color:blue; font-size:24px;'><strong>$ro[D_name]</strong></p><br>
		<h3>Sex:</h3><p style='color:blue; font-size:24px;'>$ro[Sex]</p><br><h3>DOB:</h3><p style='color:blue; font-size:24px;'>$ro[DOB]</p><br><br><br>";
    }
} 
else {
    echo "<p style='color:blue; font-size:24px;'>no director</p>";
}
}
?>
</div>

			
	</body>
</html>