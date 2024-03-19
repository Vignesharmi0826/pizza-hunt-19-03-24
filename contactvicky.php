<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$mailFrom = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	
	if (!empty($name) || !empty($mailFrom) || !empty($subject) || !empty($message) )
{
	
	$host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pizza hunt";
	
	
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From file Where email = ? Limit 50";
  $INSERT = "INSERT Into file (name , email ,subject, message )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $name,$email,$subject,$message);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

	
	$mailto = "lvicky8520@gmail.com";
	$headers = "From: ".$mailFrom;
	$txt = "You have recieved an e-mail from ".$name.".\n\n".$message;
	
	mail($mailto, $subject, $txt, $headers);
	header("Location: https://www.justdial.com/Pondicherry/Pizza-Hunt-Thattanchavadi/0413PX413-X413-161116185422-Z4I5_BZDET?mailsend");
 }
 ?>