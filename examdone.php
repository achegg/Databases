<?php
	session_start();
	session_destroy();
	echo "SESSION ENDED, YOU HAVE BEEN LOGGED OUT";
?>

<form method="post" action="studentpage.php">
<input type="submit" name="back" value="back to login">
</form>
