<?php


		

	session_start();
	unset($_SESSION['clogin']);
	echo "<script>window.open('../index.php', '_self');</script>";

?>