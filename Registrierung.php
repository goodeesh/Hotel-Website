<?php
include_once 'header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    echo '<script>
            if (confirm("Sie sind nun erfolgreich Registriert, bitte melden Sie sich an.")) {
                window.location.href = "Anmeldung.php";
            }
        </script>';
}
?>
<div class="container-fluid text-center">
    <br>
    <h1>Registrierungsformular</h1><br>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col-8 col-lg-6">
        <form action="Registrierung.php" method="post">
            <div>
                <label for="anrede">Anrede</label>
                <select class="form-control" name="anrede" id="anrede" required>
                    <option label="Frau" value="Frau"></option>
                    <option label="Herr" value="Herr"></option>
                </select>
            </div>
            <div>
                <label for="vorname">Vorname</label><br>
                <input class="form-control" width="50%" name="vorname" id="vorname" type="text" placeholder="Vorname" required>
            </div>
            <div>
                <label for="nachname">Nachname</label><br>
                <input class="form-control" name="nachname" id="nachname" type="text" placeholder="Nachname" required>
            </div>
            <div>
                <label for="email">E-mail-Adresse</label><br>
                <input class="form-control" name="email" id="email" type="email" placeholder="E-Mail-Adresse" required>
            </div>
            <div>
                <label for="benutzername">Benutzername</label><br>
                <input class="form-control" name="benutzername" id="benutzername" type="text" placeholder="Benutzername" required>
            </div>
            <div>
                <label for="passwort1" minlength="8">Passwort</label><br>
                <input class="form-control" name="password1" id="passwort1" type="password" placeholder="Passwort" required>
            </div>
            <div>
                <label for="passwort2" minlength="8">Passwort wiederholen</label><br>
                <input class="form-control" name="password2" id="passwort2" type="password" placeholder="Passwort wiederholen" required>
            </div><br>
            <input class="btn btn-primary float-lg-right" type="reset"></input>
            <input class="btn btn-primary" type="submit"></input>
        </form>
        <a href="Startseite.html">zurück zur Startseite</a>
    </div>
    <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>