<?php
//connect
$con = mysqli_connect("localhost","root","","moviedb");

//test
if(mysqli_connect_errno()){
	echo'Failed to connect'.mysqli_connect_error();
}	