<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>Update director</title>
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
				<input type="varchar" value="<?= $_GET['D_id']; ?>" id = "D_id" name="D_id" readonly = "readonly">
			  </div>
			  </div>
			  <div class="row">
			    <div class="col-25">
				<label class='label'>Name</label> 
				 </div>
				 <div class="col-75">
				<input type="char" id="D_name" name="D_name" value="<?= $_GET['D_name'];?>">
				  </div>
				 </div>
				<div class="row">
			    <div class="col-25">
				<label class='label'>Sex</label>
				</div>
				 <div class="col-75">
				<input type="text" id="Sex" name="Sex" value="<?= $_GET['Sex'];?>">
				 </div>
				 </div>
				 <div class="row">
			    <div class="col-25">
				<label class='label'>DOB</label>
				</div>
				 <div class="col-75">
				<input type="date" id="DOB" name="DOB" value="<?= $_GET['DOB'];?>">
				 </div>
				 </div>
				<input type="submit" name="submit" value="UPDATE" class="btnid">
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
    $id = mysqli_real_escape_string($con, $_POST['D_id']);
	$D_name = mysqli_real_escape_string($con, $_POST['D_name']);
	$Sex = mysqli_real_escape_string($con, $_POST['Sex']);
	$DOB = mysqli_real_escape_string($con, $_POST['DOB']);
	
	
	$sql = "UPDATE directors SET 
	D_name = '$D_name',  
	Sex= '$Sex', 
	DOB= '$DOB'
	
	WHERE D_id= '$id'";
	
	if(!mysqli_query($con,$sql)){
		echo "Not updated";
	}
	else{
		echo "Values Updated";
		header("refresh:1 url=viewD.php");
	}
	
	
}
?>
