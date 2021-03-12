<?php
	session_start();
	$db = mysqli_connect('classdb.it.mtu.edu','cs3425gr','cs3425gr','ahegg');

	echo "TAKING EXAM <br/>";
	

        if(isset($_POST['submittedans'])){
	$query="call grade('".$_SESSION['userid']."', '".$_SESSION['examname']."', "
	.$_SESSION['qnumber'].",'".$_POST['answer']."','".$_SESSION['correct']."')";
	mysqli_query($db,$query) or die ('Error querying database, You cannot take this exam twice.
	<a href="https://classdb.it.mtu.edu/~ahegg/studentpage.php">Click here to return to login</a>');
        }    


	$_SESSION['qnumber']=$_SESSION['qnumber']+1;

	$query = "select qtext, qpoints, correctans from questions where qnum = ".$_SESSION['qnumber'].
	" and eName = '" .$_SESSION['examname']."'";

	mysqli_query($db,$query) or die('Error querying database. 19');
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);

	echo $_SESSION['qnumber']. '. '. $row['qtext']. "<br/>";

	$_SESSION['correct'] = $row['correctans'];


	$query = "select cid, ctext from choice where qnum = ".$_SESSION['qnumber']."
	and eName = '".$_SESSION['examname']."'";
	
	mysqli_query($db,$query) or die ('Error querying database. 32');
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);
	echo $row['cid'].'. '.$row['ctext']."<br/>";
	while($row=mysqli_fetch_array($result)){
		echo $row['cid'].'. '.$row['ctext']."<br/>";
	}
?>

<form method="post" action="takeexam.php">
	<input type="text" name="answer">
	<input type="submit" name="submittedans" value="submit answer">
</form>



<form method="post" action="examdone.php">
	<input type="submit" name="examdone" value="finished exam">
</form>
