<?php
	session_start();
	$db = mysqli_connect('classdb.it.mtu.edu','ahegg','andrewDBpass','ahegg')
	or die ('Error connecting to MySQL Server.');
?>


<?php
	if($_POST['newpass']!=""){
                $query = "UPDATE student SET password = '".$_POST['newpass']."' WHERE
                sID = '".$_SESSION['userid']."'";

		mysqli_query($db, $query) or die ('Error querying database.'); 
                echo $_SESSION['userid'].' PASSWORD CHANGED - LOG OUT AND BACK IN';
		session_destroy();
        }
	else{
		header("Location: studenttools");
	}

?>
<form method=post action=studentpage.php>
</br>
<input type="submit" name="return" value="return to login page">
</form>

