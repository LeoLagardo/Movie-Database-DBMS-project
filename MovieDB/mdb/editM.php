<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>Update movie</title>
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	 	  <link rel="stylesheet" href="css/form2.css" type="text/css" />
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
    <div class="form">
			<form method="post">
			  <div class="row">
			    <div class="col-25">
				<label class='label'>ID</label> 
				</div>
				 <div class="col-75">
				<input type="varchar" value="<?= $_GET['Movie_id']; ?>" id = "Movie_id" name="Movie_id" readonly = "readonly">
			  </div>
			  </div>
			  <div class="row">
			    <div class="col-25">
				<label class='label'>Title</label> 
				 </div>
				 <div class="col-75">
				<input type="char" id="Title" name="Title" value="<?= $_GET['Title'];?>">
				  </div>
				 </div>
				 <div class="row">
			    <div class="col-25">
				<label class='label'>Year</label>
				</div>
				 <div class="col-75">
				<input type="Year" id="Year" name="Year" value="<?= $_GET['Year'];?>">
				 </div>
				 </div>
				<div class="row">
			    <div class="col-25">
				<label class='label'>Company</label>
				</div>
				 <div class="col-75">
				<input type="char" id="Company" name="Company" value="<?= $_GET['Company'];?>">
				 </div>
				 </div>
				 <div class="row">
			    <div class="col-25">
				<label class='label'>Rating</label>
				</div>
				 <div class="col-75">
				<input type="float" id="Rating" name="Rating" value="<?= $_GET['Rating'];?>">
				 </div>
				 </div>
				 <div class="row">
			    <div class="col-25">
				<label class='label'>D_id</label>
				</div>
				 <div class="col-75">
				<input type="varchar" id="D_id" name="D_id" value="<?= $_GET['D_id'];?>">
				 </div>
				 </div>
				  <div class="row">
			    <div class="col-25">
				<label class='label'>A_id</label>
				</div>
				 <div class="col-75">
				<input type="varchar" id="A_id" name="A_id" value="<?= $_GET['A_id'];?>">
				 </div>
				 </div>
				<input type="submit" name="submit" value="Update" class="btnid">
			</form><br><br>
			</div>
	     </body>
</html>

<?php
	$con = mysqli_connect("localhost","root","","moviedb");

//test
if(mysqli_connect_errno()){
	echo'Failed to connect'.mysqli_connect_error();
}
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($con, $_POST['Movie_id']);
	$name = mysqli_real_escape_string($con, $_POST['Title']);
	$year = mysqli_real_escape_string($con, $_POST['Year']);
	$Company = mysqli_real_escape_string($con, $_POST['Company']);
	$Rating = mysqli_real_escape_string($con, $_POST['Rating']);
	
	$D_id = mysqli_real_escape_string($con, $_POST['D_id']);
	$A_id = mysqli_real_escape_string($con, $_POST['A_id']);
	
	$sql = "UPDATE movie SET 
	Title = '$name', 
	Year= '$year', 
	Company= '$Company', 
	Rating= '$Rating', 
	D_id= '$D_id', 
	A_id= '$A_id' 
	WHERE Movie_id= '$id'";
	
	if(!mysqli_query($con,$sql)){
		echo "Not updated";
	}
	else{
		echo "<p style= 'color:#fff; font-size:20px;'>Values Updated</p>";
		header("refresh:2 url=viewM.php");
	}
	
	
}
?>
