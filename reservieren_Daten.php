<?php
session_start();
if (isset($_SESSION["user_id"])) {
  include_once 'header_angemeldet.php';

} else {
  include_once 'header.php';
}
$date = date('Y-m-d', time());
//some double checkes from the form, sicher ist sicher
if (empty($_POST["check-out_date"])) {
  die("Datum is leer, bitte fühlen Sie das Formular.");
}
if (empty($_POST["check-in_date"])) {
  die("Datum is leer, bitte fühlen Sie das Formular.");
}
if ($_POST["check-out_date"] < $_POST["check-in_date"]) {
  die("Das Datum für check-in kann nicht vor dem check-out sein.");
}
if ($_POST["check-in_date"] < $date) {
  die("Das Datum für check-in kann nicht vor heute sein.");
}
if (empty($_POST["time"])) {
  die("Uhrzeit für check-in kann nicht leer sein.");
}
if (!filter_var($_POST["guests"])) {
  die("Bite schreiben Sie eine gültige Anzahl für Gäste.");
}
if (isset($_POST['Frühstück'])) {
  $frühstück = 1;
} else {
  $frühstück = 0;
}
if (isset($_POST['Parkplatz'])) {
  $parkplatz = 1;
} else {
  $parkplatz = 0;
}
if (isset($_POST['Haustiere'])) {
  $haustiere = 1;
} else {
  $haustiere = 0;
}

//connection to database using file database.php
$mysqli = require __DIR__ . "/config/database.php";

$stmt = $mysqli->stmt_init();


$sql = "INSERT INTO reservierungen (check_in_date, anzahl, uhrzeit, zimmer, check_out_date, fk_personid, zustand, frühstück, parkplatz, haustiere)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if (!$stmt->prepare($sql)) {
  die("SQL error: " . $mysqli->error);
}

$zustand = "In bearbeitung";
$stmt->bind_param(
  "ssssssssss",
  $_POST["check-in_date"],
  $_POST["guests"],
  $_POST["time"],
  $_POST["zimmer"],
  $_POST["check-out_date"],
  $user["id"],
  $zustand,
  $frühstück,
  $parkplatz,
  $haustiere
);

$stmt->execute();
?>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id="card">
      <p class="text-center"> Reservierung beantragt.
        <br><br>
        <button class="btn btn-primary"><a href="Reservierungen.php" style="color: black;">Reservierungen ansehen</a>
        </button>
      </p>

    </div>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>