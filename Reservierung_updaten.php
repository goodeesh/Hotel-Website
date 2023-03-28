<?php
session_start();
include_once 'header_angemeldet.php';
//connection to database using file database.php
  $mysqli = require __DIR__ . "/config/database.php";
echo $_POST["id"];
//we look for the right reservation

$sql = "SELECT * FROM reservierungen
    WHERE id = {$_POST["id"]}";

$stmt = $mysqli->stmt_init();

$result = $mysqli->query($sql);

$artikel = $result->fetch_assoc();

$stmt = $mysqli->stmt_init();
//and we update the status of the reservation
if (!empty($_POST["status"])) {
  $sql_anrede = "UPDATE reservierungen
SET zustand = (?)
WHERE id = '" . $artikel["id"] . "'";
  if (!$stmt->prepare($sql_anrede)) {
    die("SQL error: " . $mysqli->error);
  }
  $stmt->bind_param(
    "s",
    $_POST["status"],
  );
  $stmt->execute();
}
header('Refresh: 1; URL =Reservierungen_admin.php');
?>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id="card">
      <p class="text-center"> Der Zustand wurde aktualisiert.
      </p>

    </div>
  </div>
  <div class="col"></div>
</div>

<?php include_once 'footer.php'; ?>