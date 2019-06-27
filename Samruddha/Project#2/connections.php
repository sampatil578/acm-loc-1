<?php

$db = mysqli_connect("localhost","id9653310_lms","lms123");
if(!$db){
	die('could not connect: '.mysqli_error());
}
mysqli_select_db($db,"id9653310_lms");

?>