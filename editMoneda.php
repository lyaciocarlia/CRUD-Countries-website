<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tari";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Conexiune esuata: " . $conn->connect_error);
        }
        $id=(int)$_POST['id'];
        $nume=$_POST['nume'];
        $simbol=$_POST['simbol'];
        
        $conn->query("UPDATE moneda SET Nume='".$nume."',Simbol='".$simbol."' WHERE Id=".$id);

        header("Location: http://localhost/Studiu Individual/main_form.php");
        exit();
        $conn->close();
?>