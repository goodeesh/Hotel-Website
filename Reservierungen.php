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
                //here we only display the info from the user we check
                $sql = "SELECT * FROM reservierungen WHERE fk_personid = '$user[id]'";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    $nummer = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "-Reservierung nummer " . $nummer . ":<br><br>";
                        echo "Datum: " . $row["Datum"] . " Uhr.<br>";
                        echo "Check-In: " . $row["check_in_date"] . " um " . $row["uhrzeit"] . " Uhr.<br>";
                        echo "Check-out: " . $row["check_out_date"] . " um 11 Uhr.<br>";
                        echo "Anzahl der Gäste: " . $row["anzahl"] . ".<br>";
                        echo "Zimmer: " . $row["zimmer"] . ".<br>";
                        echo "Status: " . $row["zustand"] . ".<br>";
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
                        echo "Haustiere: " . $status . ".<br><br>";
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