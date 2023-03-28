<?php
session_start();

include_once 'header_angemeldet.php';
//connect to database
$mysqli = require __DIR__ . "/config/database.php";
//here we look for the id of the user we want to update and we safe it in user_verwalten
$stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();
$result = $stmt->get_result();
$user_verwalten = $result->fetch_assoc();
//here we make some checks for the input of the user and if there was one, then we update the data
$stmt = $mysqli->stmt_init();
if (!empty($_POST["status"])) {
  $stmt = $mysqli->prepare("UPDATE user SET active = ? WHERE id = ?");
  $stmt->bind_param("si", $_POST["status"], $user_verwalten["id"]);
  $stmt->execute();
}
if (!empty($_POST["anrede"])) {
  $stmt = $mysqli->prepare("UPDATE user SET anrede = ? WHERE id = ?");
  $stmt->bind_param("si", $_POST["anrede"], $user_verwalten["id"]);
  $stmt->execute();
}
if (!empty($_POST["vorname"])) {
  $stmt = $mysqli->prepare("UPDATE user SET vorname = ? WHERE id = ?");
  $stmt->bind_param("si", $_POST["vorname"], $user_verwalten["id"]);
  $stmt->execute();
}
if (!empty($_POST["nachname"])) {
  $stmt = $mysqli->prepare("UPDATE user SET nachname = ? WHERE id = ?");
  $stmt->bind_param("si", $_POST["nachname"], $user_verwalten["id"]);
  $stmt->execute();
}
//in case the email is already linked with another account then we display an email, it will also be proved to see its a valid email
if (!empty($_POST["email"])) {
  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Bite schreiben Sie eine gültige E-mail Adresse.");
  }
  $select_email = mysqli_query($mysqli, "SELECT * FROM user WHERE email = '" . $_POST['email'] . "'");
  if (mysqli_num_rows($select_email)) {
    exit('Diese E-mail Addrese ist bereits registriert!');
  }
  $stmt = mysqli_prepare($mysqli, "UPDATE user SET email = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "si", $_POST["email"], $user_verwalten["id"]);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
//username is also checked like email to see if it is linked with another account
if (!empty($_POST["benutzername"])) {
  $select_user = mysqli_query($mysqli, "SELECT * FROM user WHERE benutzername = '" . $_POST['benutzername'] . "'");
  if (mysqli_num_rows($select_user)) {
    exit('Diese Benutzername is bereits registriert!');
  }
  $stmt = mysqli_prepare($mysqli, "UPDATE user SET benutzername = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "si", $_POST["benutzername"], $user_verwalten["id"]);
  $directory = "C:/xampp/htdocs/hotel/images/" . $user_verwalten['benutzername'] . ".png";
  $destination = "C:/xampp/htdocs/hotel/images/" . $_POST['benutzername'] . ".png";
  copy($directory, $destination);
  unlink($directory);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
//in case we changue password, both must be the same and be larger than 8 characters
if (!empty($_POST["password1"])) {
  if ((strlen($_POST["password1"]) < 8)) {
    die("Passwort kann nicht kurzer als 8 Zeichnen sein.");
  }
  if ($_POST["password1"] !== $_POST["password2"]) {
    die("Beide Passwort müssen gleich sein.");
  }
  $password_hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);
  $stmt = mysqli_prepare($mysqli, "UPDATE user SET password_hash = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "si", $password_hash, $user_verwalten["id"]);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
?>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id='card'>
      <p class="text-center">Die Daten wurden aktualisiert.
        <br>
        <br>
        <button class="btn btn-primary"><a href="User_verwaltung.php" style="color: black;">zurück zur User
            Verwaltung</a> </button>
      </p>
    </div>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>