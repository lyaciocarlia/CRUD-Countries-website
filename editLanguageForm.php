<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tari";

    // Crearea conexiunii
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificarea conexiunii
    if ($conn->connect_error) {
      die("Conexiune esuata: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM limba WHERE Id=".$_POST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "
    <!DOCTYPE html>
    <html>
    
    <head>
        <title>Limbi</title>
    </head>
    
    <style type='text/css'>
    body {
        margin: 0px;
        padding: 0px;
    }
    
    h3 {
        text-align: center;
    }
    
    #editForm {
        margin-top: 25px;
        display: flex;
        flex-direction: column;
    }
    
    input{
        margin: 5px 25px;
        width: auto;
        font-size: 16px;
    }
    </style>
    
    <body>
        <div>
        <h3>Forma de editare a limbilor</h3>
    
            <form action='editLanguage.php' method='post' id='editForm'>
                <input type='hidden' name='id' value=".$row['Id'].">
                <input type='text' name='denumire' value=".$row['Denumire'].">
                <input type='submit' value='Modifica'>
            </form>  
        </div>
    </body>
    </html>
    ";
?>