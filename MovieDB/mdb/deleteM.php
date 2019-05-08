<?php
$con = mysqli_connect("localhost","root","","moviedb");

if(mysqli_connect_errno()){
	echo'Failed to connect'.mysqli_connect_error();
}
if(isset($_GET['Movie_id']))
{
$Movie_id  = $_GET['Movie_id'];
$sql = "DELETE FROM movie WHERE Movie_id='$Movie_id'";

if(!mysqli_query($con,$sql))
{
	echo "<p style='color:red; font-size:24px;'>Not deleted";
}
	else
	{
		echo "<p style='color:red; font-size:24px;'>row deleted";
		header("refresh:1 url=viewM.php");
	}
}
?>