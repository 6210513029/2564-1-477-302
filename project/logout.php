<?php
		//16.clear sessions
		session_start();

		if (isset($_SESSION['id'])) {
			session_destroy();
			unset($_SESSION['id']);
			unset($_SESSION['name']);
		}
		header("location: login.php");
		
?>
