<?php
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
    <h1>News</h1><br>
    <div class="row">
        <div class="col"></div>
        <div class="col-8 col-lg-6">
            <?php
            $stmt = $mysqli->prepare("SELECT * FROM news ORDER BY Datum DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            //if there is more than 0 then we loop trought the "row" and we print out the things that interest us
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div id='card'>";
                    echo "Datum: " . $row["Datum"] . " Uhr.<br><br>";
                    echo "<h2 class='text-center'>" . $row["Überschrift"] . "</h2><br>";
                    echo "<div class='text-center'>";
                    echo  '<img width="50%" id="newsphoto" src=uploads/news/' . $row["photo"] . '><br><br>';
                    echo "</div>";
                    echo "<p class='text-left'>" . $row["Artikel"] . "</p>";
                    echo "</div><br>";
                }
            }
            if (isset($user['benutzername'])) {
                if ($user['benutzername'] == "admin") {
                    echo '<a href="Artikel_neu.php"class="btn btn-primary" type="submit">Neuen Artikel hinzufügen</a>';
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