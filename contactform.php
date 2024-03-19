<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];
	
	$mailto = "lvicky8520@gmail.com";
	$headers = "From: ".$mailFrom;
	$txt = "You have recieved an e-mail from ".$name.".\n\n".$message;
	
	mail($mailto, $subject, $txt, $headers);
	header("Location: file:///C:/xampp/htdocs/all%20boos/contact.html/?mailsend");
 }
 ?>