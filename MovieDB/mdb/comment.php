<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
     <head>
	 <meta charset="utf-8" />
	 <title>Review</title>
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	 <link rel="stylesheet" href="css/table.css" type="text/css" />
	<style> 
	input[type=submit] {
    background-color:blue;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
	
	
	textarea {
    width: 75%;
    height: 120px;
    padding: 12px 0px;
    box-sizing: border-box;
    border: 1px solid blue;
    border-radius: 4px;
    background:none;
	color;white;
    font-size: 20px;
    resize: none;
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
			
			<p style='color:Blue; font-size:30px;'>Reviews</h1><br><br>
				
<?php
	
	if(isset($_GET['Movie_id'])){
		
		$Movie_id  = $_GET['Movie_id'];
		$sql = "SELECT * FROM review 
				WHERE Movie_id ='$Movie_id'";
				
			
			
			$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($ro = $result->fetch_assoc()) {
        
		echo"<h3>Comments:</h3><br><p style='color:red;'>$ro[user_name]:</p><br><p style='color:white; font-size:24px;'>$ro[Comment]</p><br><br>";
    }
} 
else {
    echo "<p style='color:red; font-size:24px;'>no comments</p>";
}
}
?>
		<div class="formC">
			<form method="post">
					   <input type="varchar" value="<?= $_GET['Movie_id']; ?>" id = "Movie_id" name="Movie_id" readonly = "readonly">
					  <label>user_name<span class="required">*</span></label>
					  <input type="text" name="user_name" class="field-divided" placeholder="username" /><br>
					  
						<label>Comment:<span class="required"></label><br>
						
					    <textarea name="Comment"> </textarea><br>
					  
						<input name="submit" type="submit" value="COMMENT">
					  


            </form>
			</div>
<?php

if (isset($_POST['submit'])) 
{ 
// Instructions if $_POST['value'] exist 

	$id = mysqli_real_escape_string($con, $_POST['Movie_id']);
	$uname = mysqli_real_escape_string($con, $_POST['user_name']);
	$name = mysqli_real_escape_string($con, $_POST['Comment']);
	
	
	$sql = "INSERT INTO review (Movie_id,user_name,Comment) VALUES ('$id','$uname','$name')";
	
	if(!mysqli_query($con,$sql))
	{
		echo 'Not inserted';
	}
	else
	{
		header("refresh:0 url=viewM.php");
	}
	
}
?>
			
	</body>
</html>