<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "tari";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $db_name);

// Verificarea conexiunii
if ($conn->connect_error) {
  die("Conexiunea esuata: " . $conn->connect_error);
}

$denumire = $_POST['denumire'];
$conn->query("INSERT limba(Denumire)
	VALUES('$denumire')");
header("Location: http://localhost/Studiu Individual/main_form.php");
exit();
//Incheierea conexiunii
$conn->close();
?>