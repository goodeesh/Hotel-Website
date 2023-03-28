<?php
//some double checkes from the form, sicher ist sicher
if (empty($_POST["vorname"])) {
  die("Vorname is leer, bitte schreiben Sie Ihr Vorname.");
}
if (empty($_POST["nachname"])) {
  die("Nachname is leer, bitte schreiben Sie Ihr Nachname.");
}
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  die("Bite schreiben Sie eine gültige E-mail Adresse.");
}
if (strlen($_POST["password1"] < 8)) {
  die("Passwort kann nicht kurzer als 8 Zeichnen sein.");
}
if ($_POST["password1"] !== $_POST["password2"]) {
  die("Beide Passwort müssen gleich sein.");
}
//create a secure password to store in case the database is compromised
$password_hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);

//connection to database using file database.php
  $mysqli = require __DIR__ . "/config/database.php";

// prepare statement
$stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");

// bind parameters
$stmt->bind_param("s", $_POST["email"]);

// execute statement
$stmt->execute();

// store results
$stmt->store_result();

// check if email already in use
if ($stmt->num_rows > 0) {
  exit('Diese E-mail Addrese ist bereits registriert!');
}

$stmt = $mysqli->prepare("SELECT * FROM user WHERE benutzername = ?");

// bind parameters
$stmt->bind_param("s", $_POST["benutzername"]);

// execute statement
$stmt->execute();

// store results
$stmt->store_result();

// check if benutzername already in use
if ($stmt->num_rows > 0) {
  exit('Dieser Benutzername is bereits registriert!');
}

$stmt = $mysqli->prepare("INSERT INTO user (benutzername, email, password_hash,vorname,nachname,anrede) VALUES (?,?,?,?,?,?)");

// bind parameters
$stmt->bind_param("ssssss", $_POST["benutzername"], $_POST["email"], $password_hash, $_POST["vorname"], $_POST["nachname"], $_POST["anrede"]);

// execute statement
$stmt->execute();
include_once 'header.php';
?>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id='card'>
      <p class="text-center">Welcome
        <?php echo $_POST["anrede"]; ?>
        <?php echo $_POST["vorname"]; ?>
        <?php echo $_POST["nachname"]; ?>.
        Your were registered with the email address:
        <?php echo $_POST["email"]; ?>
        <br><br>
        <button class="btn btn-primary"><a href="index.php" style="color: black;">zurück zur Startseite</a> </button>
        <button class="btn btn-primary"><a href="Anmeldung.php" style="color: black;">zur Anmeldung</a> </button>
     </p>
    </div>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>