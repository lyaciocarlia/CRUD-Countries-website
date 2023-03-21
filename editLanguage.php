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
        $denumire=$_POST['denumire'];
        
        $conn->query("UPDATE limba SET Denumire='".$denumire."' WHERE Id=".$id);

        header("Location: http://localhost/Studiu Individual/main_form.php");
        exit();
        $conn->close();
?>