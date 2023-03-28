<?php
//page to check users and aktivate or deactivate it
session_start();
if (isset($_SESSION["user_id"])) {
    include_once 'header_angemeldet.php';
} else {
    $mysqli = require __DIR__ . "/config/database.php";
    include_once 'header.php';
}

?>
<br>
<div class="container-fluid text-center">
    <h1>User Verwaltung</h1><br>
    <div class="row">
        <div class="col"></div>
        <div class="col-8 col-lg-6">
            <?php
            $stmt = $mysqli->prepare("SELECT * FROM user");
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $status = "Aktiv";
                while ($row = $result->fetch_assoc()) {
                    if($row["active"] == 1){
                        $status = "Aktiv";
                    } else{
                        $status = "Deaktiviert";
                    }
                    echo "<div id='card'>";
                    echo ' Benutzername: ' . $row["benutzername"] . '<br>';
                    echo ' Status: ' . $status . '<br>';
                    echo ' Anrede: ' . $row["anrede"] . '<br>';
                    echo ' Name: ' . $row["vorname"] . ' ' . $row["nachname"] . '<br>';
                    echo ' E-mail: ' . $row["email"] . '<br>';
                    echo '
                    <form action="profil_admin_verwalten.php" method="post">
                    <input name="id" type="hidden" id="id" value=' . $row["id"] . '>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Profil anschauen"></input>
                    </form>';
                    echo "</div><br>";
                }
            }
            $mysqli->close();
            ?>
            <br>
        </div>
        <div class="col"></div>
    </div>
</div>
<br>
</div>
<?php include_once 'footer.php'; ?>