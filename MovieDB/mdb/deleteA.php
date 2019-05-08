<?php
$con = mysqli_connect("localhost","root","","moviedb");

if(mysqli_connect_errno()){
	echo'Failed to connect'.mysqli_connect_error();
}
if(isset($_GET['A_id']))
{
$A_id  = $_GET['A_id'];
$sql = "DELETE FROM actors WHERE A_id='$A_id'";

if(!mysqli_query($con,$sql))
{
	echo "Not deleted";
}
	else
	{
		echo "row deleted";
		header("refresh:1 url=viewA.php");
	}
}
?>