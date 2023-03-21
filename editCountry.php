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
        $capitala=$_POST['capitala'];
        $continent=$_POST['continent'];
        $limba = $_POST['limba'];
        $suprafata=(double)$_POST['suprafata'];
        $populatie=(int)$_POST['locuitori'];
        
        $conn->query("UPDATE tara SET Nume='".$nume."', Capitala='".$capitala."', IdContinent='".$continent."', IdLimba='".$limba."', Suprafata=".$suprafata.", Locuitori=".$populatie." WHERE Id=".$id);

        header("Location: http://localhost/Studiu Individual/main_form.php");
        exit();
        $conn->close();
?>