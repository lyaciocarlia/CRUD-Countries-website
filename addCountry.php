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

$nume = $_POST['nume'];
$capitala = $_POST['capitala'];
$continent = $_POST['continent'];
$limba = $_POST['limba'];
$suprafata = $_POST['suprafata'];
$populatie = $_POST['locuitori'];
$conn->query("INSERT tara(Nume, Capitala, IdContinent, IdLimba, Suprafata, Locuitori)
	VALUES('$nume','$capitala','$continent', '$limba','$suprafata',$populatie)");
header("Location: http://localhost/Studiu Individual/main_form.php");
exit();
//Incheierea conexiunii
$conn->close();
?>