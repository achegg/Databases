<?php
	session_start();
	$_SESSION['qnumber']=0;
	echo 'LOGGED IN AS ' . $_SESSION['userid'];
?>

<form method=post action=takeexamint.php>
<b>
take exam:
<input type="text" name="examname">
<input type="submit" name="takeexam" value="start exam">
</form>

<form method=post action=scoreview.php>
view score:
<input type="text" name="scoredexam">
<input type="submit" name="viewscore" value="view results">
</form>

<form method=post action=changepass.php>
new password (max 25 char):
<input type="text" name="newpass">
<input type="submit" name="change password" value="change password">
<input type="hidden" name="userid" value=$userid>
</form>

<form method=post action=examdone.php>
<input type=submit name="logout" value="logout">
</form>
