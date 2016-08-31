<?php
if(!empty($_POST)) {
	include 'connection.php';
try {
    $name = $_POST['name'];
    $email = $_POST['email'];
	$message = $_POST['message'];
    $date = date("Y-m-d");
	
	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
    // Insert data
    $sql_insert = "INSERT INTO messages (name, email, messages, date) 
                   VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $email);
	$stmt->bindValue(3, $message);
    $stmt->bindValue(4, $date);
    $stmt->execute();
	
	header("Location:http://www.cyberknights.in/contact.php?id='y'");
}
catch(Exception $e) {
    var_dump($e);
}

}
else
{
	echo "Error";
}

?>