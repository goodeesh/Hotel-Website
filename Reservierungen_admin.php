<?php
session_start();

include_once 'header_angemeldet.php';

?>
<br>
<div class="container-fluid text-center">
    <h1>Reservierungen</h1><br>
    <div class="row">
        <div class="col"></div>
        <div class="col-8 col-lg-6">
            <div id="card">
                <?php
                //we display all the data from reservierungen for the admin
                $sql = "SELECT * FROM reservierungen";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    $nummer = 1;
                    //printing the info we need from each row
                    while ($row = $result->fetch_assoc()) {
                        echo "-Reservierung nummer " . $nummer . ":<br><br>";
                        echo "Datum: " . $row["Datum"] . " Uhr.<br>";
                        echo "Check-In: " . $row["check_in_date"] . " um " . $row["uhrzeit"] . " Uhr.<br>";
                        echo "Check-out: " . $row["check_out_date"] . " um 11 Uhr.<br>";
                        echo "Anzahl der Gäste: " . $row["anzahl"] . ".<br>";
                        echo "Zimmer: " . $row["zimmer"] . ".<br>";
                        if($row["frühstück"] == 1){
                            $status = "Inkludiert";
                        } else{
                            $status = "Nicht inkludiert";
                        }

                        echo "Frühstück: " . $status . ".<br>";
                        if($row["parkplatz"] == 1){
                            $status = "Inkludiert";
                        } else{
                            $status = "Nicht inkludiert";
                        }
                        echo "Parkplatz: " . $status . ".<br>";
                        if($row["haustiere"] == 1){
                            $status = "Ja";
                        } else{
                            $status = "Nein";
                        }
                        echo "Haustiere: " . $status . ".<br>";
                        echo 'Status: '. $row["zustand"] . '<br><br><form action="Reservierung_updaten.php" method="post">
                        <select class="form-control" name="status" id="status" default="Storniert">
                        <option label="In Bearbeitung" value="In Bearbeitung"></option>
                        <option label="Bestätigt" value="Bestätigt"></option>
                        <option label="Storniert" value="Storniert"></option>
                        </select>
                        <input name="id" type="hidden" id="id" value=' . $row["id"] . '>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Status updaten"></input>
                    </form>
                    <br>';
                        $nummer++;
                    }

                } else {
                    echo "Derzeit gibt es keine Reservierung<br><br>";
                    echo '<a class="btn btn-primary" href="reservieren.php">Reservieren</a>';

                }
                $mysqli->close();
                ?>
            </div>
            <br>
        </div>
        <div class="col"></div>
    </div>
</div>
<br>
</div>
<?php include_once 'footer.php'; ?>