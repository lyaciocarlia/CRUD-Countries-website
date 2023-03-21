<!DOCTYPE html>
<html>

<head>
    <title>Țări/Limbi</title>
</head>

<style type="text/css">
body {
    margin: 0px;
    padding: 0px;
}

h2 {
    text-align: center;
}

.addForm {
    margin-top: 25px;
    display: flex;
    flex-direction: column;
}

input,
select {
    margin: 5px 75px;
    width: auto;
    font-size: 16px;
}

table {
    margin: 25px 75px;
}
</style>

<body>
    <!-- Forma de adaugare a tarilor -->
    <div>
        <h2>Introduceți o țară</h2>
        <form action="addCountry.php" method="post" class="addForm">
            <input type="text" name="nume" placeholder="Introduceti denumirea tarii">
            <input type="text" name="capitala" placeholder="Introduceti capitala tarii">
            <select name="continent">
                <option>Alege continentul</option>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $db_name = "tari";

                    $conn = new mysqli($servername, $username, $password, $db_name);

                    if ($conn->connect_error) {
                        die("Conexiunea esuata: " . $conn->connect_error);
                    } else {

                        $result = $conn->query("SELECT * FROM continent");
                        while ($row = $result->fetch_array()) {
                            echo "<option value=".$row[0].">".$row[1]."</option>";
                        }
                    }
                    $conn->close();
                    ?>
            </select>
            <select name="limba">
                <option>Alege limba</option>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $db_name = "tari";

                    $conn = new mysqli($servername, $username, $password, $db_name);

                    if ($conn->connect_error) {
                        die("Conexiunea esuata: " . $conn->connect_error);
                    } else {

                        $result = $conn->query("SELECT * FROM limba");
                        while ($row = $result->fetch_array()) {
                            echo "<option value=".$row[0].">".$row[1]."</option>";
                        }
                    }
                    $conn->close();
                    ?>
            </select>
            <input type="number" name="suprafata" placeholder="Introduceti suprafata">
            <input type="number" name="locuitori" placeholder="Introduceti numarul de locuitori">
            <input type="submit" value="Trimite">
        </form>
    </div>
    <!-- Tabelul cu tarile -->
    <div>
        <h2>Lista țărilor introduse</h2>
        <table border="1">
            <tr>
                <td style="width: 100px;">Denumire</td>
                <td style="width: 100px;">Capitala</td>
                <td style="width: 200px;">Continent</td>
                <td style="width: 200px;">Limba vorbita</td>
                <td style="width: 100px;">Suprafata</td>
                <td style="width: 100px;">Populatie</td>
                <td style="width: 100px;">Moneda</td>
                <td style="width: 200px;">Drapel</td>
                <td></td>
                <td></td>
            </tr>
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
                else {
                
                $result = $conn->query("SELECT tara.Id, tara.Nume, tara.Capitala, continent.Nume, 
                limba.Denumire, tara.Suprafata, tara.Locuitori, moneda.simbol, drapel.nume FROM tara
                JOIN continent on continent.Id = tara.IdContinent
                JOIN limba on limba.Id = tara.IdLimba
                JOIN drapel on drapel.Id = tara.IdDrapel
                JOIN moneda on moneda.Id = tara.IdMoneda");
                while($row=$result->fetch_array()){
                    echo "
                        <tr>
                            <td>".$row[1]."</td>
                            <td>".$row[2]."</td>
                            <td>".$row[3]."</td>
                            <td>".$row[4]."</td>
                            <td>".$row[5]."</td>
                            <td>".$row[6]."</td>
                            <td>".$row[7]."</td>
                            <td>".$row[8]."</td>
                            <td></td>
                            <td><form action='deleteCountry.php' method='post'><input type='hidden' name='id' value=".$row[0]."><input type='submit' value='Sterge'></form></td>
                            <td><form action='editCountryForm.php' method='post'><input type='hidden' name='id' value=".$row[0]."><input type='submit' value='Modifica'></form></td>
                        </tr>
                    ";
                }
                }
            ?>
        </table>
    </div>
    <!-- Forma de adaugare a limbii -->
    <div>
        <br><h2>Introduceți o limbă</h2>
        <form action="addLanguage.php" method="post" class="addForm">
            <input type="text" name="denumire" placeholder="Introduceti denumirea limbii">
            <input type="submit" value="Trimite">
        </form>
    </div>
    <!-- Tabelul cu limbile -->
    <div>
        <h2>Lista limbilor introduse</h2>
        <table border="1">
            <tr>
                <td style="width: 100px;">Denumire</td>
                <td></td>
                <td></td>
            </tr>
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
                else {
                
                $result = $conn->query("SELECT * FROM limba");
                while($row=$result->fetch_array()){
                    echo "
                        <tr>
                            <td>".$row[1]."</td>
                            <td><form action='editLanguageForm.php' method='post'><input type='hidden' name='id' value=".$row[0]."><input type='submit' value='Modifica'></form></td>
                        </tr>
                    ";
                }
                }
            ?>
        </table>
    </div>

     <!-- Forma de adaugare a monedei -->
     <div>
        <br><h2>Introduceți o moneda</h2>
        <form action="addMoneda.php" method="post" class="addForm">
            <input type="text" name="nume" placeholder="Introduceti denumirea monedei">
            <input type="text" name="simbol" placeholder="Introduceti simbolul monedei">
            <input type="submit" value="Trimite">
        </form>
    </div>
    <!-- Tabelul cu monedele -->
    <div>
        <h2>Lista monedelor introduse</h2>
        <table border="1">
            <tr>
                <td style="width: 100px;">Denumire</td>
                <td></td>
                <td></td>
            </tr>
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
                else {
                
                $result = $conn->query("SELECT * FROM moneda");
                while($row=$result->fetch_array()){
                    echo "
                        <tr>
                            <td>".$row[1]."</td>
                            <td>".$row[2]."</td>
                           
                            <td><form action='editMonedaForm.php' method='post'><input type='hidden' name='id' value=".$row[0]."><input type='submit' value='Modifica'></form></td>
                        </tr>
                    ";
                }
                }
            ?>
        </table>
    </div>
</body>

</html>