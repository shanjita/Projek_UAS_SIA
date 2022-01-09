<?php
$con = mysqli_connect("localhost","root","","project_sia");

if(mysqli_connect_errno($con)){
	echo "Failed" . mysqli_connect_error();
}else {
	echo "";
	}
?>