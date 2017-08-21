<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("Location: http://cyberknights.in/digi-school")
?>