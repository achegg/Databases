<?php
	session_start();
	$_SESSION['examname']=$_POST['examname'];
	header("Location: takeexam.php");
?>
