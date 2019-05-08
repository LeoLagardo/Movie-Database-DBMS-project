<?php
$con = mysqli_connect("localhost","root","","moviedb");

if(mysqli_connect_errno()){
	echo'Failed to connect'.mysqli_connect_error();
}
if(isset($_GET['D_id']))
{
$D_id  = $_GET['D_id'];
$sql = "DELETE FROM directors WHERE D_id='$D_id'";

if(!mysqli_query($con,$sql))
{
	echo "Not deleted";
}
	else
	{
		echo "row deleted";
		header("refresh:1 url=viewD.php");
	}
}
?>