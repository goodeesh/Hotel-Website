<?php
session_start();

include_once 'header_angemeldet.php';

$mysqli = require __DIR__ . "/config/database.php";
$stmt = $mysqli->stmt_init();
//here we make some checks for the input of the user and if there was one, then we update the data
if (password_verify($_POST["password"], $user["password_hash"])) {
  if (!empty($_POST["anrede"])) {
    $stmt = $mysqli->prepare("UPDATE user SET anrede = ? WHERE id = ?");
    $stmt->bind_param("si", $_POST["anrede"], $user["id"]);
    $stmt->execute();
  }
  if (!empty($_POST["vorname"])) {
    $stmt = $mysqli->prepare("UPDATE user SET vorname = ? WHERE id = ?");
    $stmt->bind_param("si", $_POST["vorname"], $user["id"]);
    $stmt->execute();
  }
  if (!empty($_POST["nachname"])) {
    $stmt = $mysqli->prepare("UPDATE user SET nachname = ? WHERE id = ?");
    $stmt->bind_param("si", $_POST["nachname"], $user["id"]);
    $stmt->execute();
  }
  if (!empty($_POST["email"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      die("Bite schreiben Sie eine gültige E-mail Adresse.");
    }
    $select_email = mysqli_query($mysqli, "SELECT * FROM user WHERE email = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($select_email)) {
      exit('Diese E-mail Addrese ist bereits registriert!');
    }
    $stmt = mysqli_prepare($mysqli, "UPDATE user SET email = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $_POST["email"], $user["id"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  if (!empty($_POST["benutzername"])) {
    $select_user = mysqli_query($mysqli, "SELECT * FROM user WHERE benutzername = '" . $_POST['benutzername'] . "'");
    if (mysqli_num_rows($select_user)) {
      exit('Diese Benutzername is bereits registriert!');
    }
    $stmt = mysqli_prepare($mysqli, "UPDATE user SET benutzername = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $_POST["benutzername"], $user["id"]);
    $directory = "C:/xampp/htdocs/hotel/images/" . $user['benutzername'] . ".png";
    $destination = "C:/xampp/htdocs/hotel/images/" . $_POST['benutzername'] . ".png";
    copy($directory, $destination);
    unlink($directory);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  if (!empty($_POST["password1"])) {
    if ((strlen($_POST["password1"]) < 8)) {
      die("Password kann nicht kurzer als 8 Zeichnen sein.");
    }
    if ($_POST["password1"] !== $_POST["password2"]) {
      die("Beide Passwort müssen gleich sein.");
    }
    $password_hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($mysqli, "UPDATE user SET password_hash = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $password_hash, $user["id"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
} else {
  die("Password ist falsch. Bestätigen Sie es nochmal bitte.");
}
?>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id='card'>
      <p class="text-center">Die Daten wurden aktualisiert.
        <br>
        <br>
        <button class="btn btn-primary"><a href="profil.php" style="color: black;">zurück zum
            Profil</a> </button>
      </p>
    </div>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>