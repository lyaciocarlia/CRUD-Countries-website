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
    $sql = "SELECT * FROM tara WHERE Id=".$_POST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "
    <!DOCTYPE html>
    <html>
    
    <head>
        <title>Țări</title>
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
    
    input,
    select {
        margin: 5px 25px;
        width: auto;
        font-size: 16px;
    }
    </style>
    
    <body>
        <div>
        <h3>Forma de editare a tarii</h3>
    
            <form action='editCountry.php' method='post' id='editForm'>
                <input type='hidden' name='id' value=".$row['Id'].">
                <input type='text' name='nume' value=".$row['Nume'].">
                <input type='text' name='capitala' value=".$row['Capitala'].">
                <select name='continent' id='continent'>";
                    $result = $conn->query('SELECT * FROM continent');
                    while ($row1 = $result->fetch_array()) {
                        echo "<option value=".$row1[0].">".$row1[1]."</option>";
                    }
                echo "</select>
                <select name='limba' id='limba'>";
                    $result = $conn->query("SELECT * FROM limba");
                    while ($row1 = $result->fetch_array()) {
                        echo "<option value=".$row1[0].">".$row1[1]."</option>";
                    }
                echo "</select>
                <script>
                    var select = document.getElementById('continent');
                    select.value = parseInt(".$row['IdContinent'].");
                    
                    select = document.getElementById('limba');
                    select.value = parseInt(".$row['IdLimba'].");
                </script>
                <input type='number' name='suprafata' value=".$row['Suprafata'].">
                <input type='number' name='locuitori' value=".$row['Locuitori'].">
                <input type='submit' value='Modifica'>
            </form>  
        </div>
    </body>
    </html>
    ";
?>