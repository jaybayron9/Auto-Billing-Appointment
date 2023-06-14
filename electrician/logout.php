<?php


		

	session_start();
	unset($_SESSION['elogin']);
	echo "<script>window.open('../index.php', '_self');</script>";

?>