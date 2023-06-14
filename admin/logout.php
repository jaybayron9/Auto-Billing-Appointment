<?php


		

	session_start();
	unset($_SESSION['alogin']);
	echo "<script>window.open('../index.php', '_self');</script>";

?>