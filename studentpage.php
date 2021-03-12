<?php
	//connect to DB
	$db = mysqli_connect('classdb.it.mtu.edu','ahegg','andrewDBpass','ahegg')
	or die('Error connecting to MySQL server.');

session_start();

if(isset($_POST["logout"])) {
        session_destroy();
        echo "user logged out<br/>";
	echo '<a href="https://classdb.it.mtu.edu/~ahegg/studentpage.php">Back to login</a>';
        return;
}


if (isset($_POST["userid"])) {
	
	$query = "SELECT sID, password  FROM student WHERE sID = '".$_POST["userid"]."'";
	mysqli_query($db, $query);

	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);

	if ($_POST["userid"]==$row['sID'] && $_POST["password"]==$row['password']){
                $_SESSION["loggedin"]=true;
		$_SESSION["userid"]=$row['sID'];
                header("Location: studenttools");
                return;
        } else {
                echo "incorrect username and password" ;
        }
}
?>


<form method=post action=studentpage.php>
username: <input type="text" name="userid">
<br>
password: <input type="password" name="password">
<br>
<input type="submit" name="login" value="login">
<input type="submit" name="logout" value="logout">
</form>

