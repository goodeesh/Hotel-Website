<?php
//profilupdate for the admin
session_start();

include_once 'header_angemeldet.php';

  $mysqli = require __DIR__ . "/config/database.php";

$stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();
$result = $stmt->get_result();
$user_verwalten = $result->fetch_assoc();

$directory = "C:/xampp/htdocs/hotel/images/" . $user_verwalten['benutzername'] . ".png";

?>
<br>
<div class="container-fluid text-center">
    <h1>Profil</h1><br>
    <?php if (file_exists($directory)): ?>
        <img id="profilphoto" width="100px"
            src="images/<?= htmlspecialchars($user_verwalten["benutzername"]) ?>.png?t=<?php echo time() ?>">
    <?php else: ?>
        <img id="profilphoto" width="100px" src="images/res/default.jpg
">
    <?php endif ?>

    <form enctype="multipart/form-data" method="post" action="photo_update.php">
        <label for="Hochladen">Profilphoto ändern</label>
        <input name="id" type="hidden" id="id" value="<?= htmlspecialchars($user_verwalten["id"]) ?>">
        <input type="file" name="picture" accept="image/png, image/gif, image/jpeg">
        <input type="submit" value="Hochladen">
    </form>
</div>
<br>

<div class="row">
    <div class="col"></div>

    <div class="col-8 col-lg-6" style="padding: 20px;">
        <div id="card">
            <form action="Daten_updaten_admin.php" method="post">
                <div class="row">
                    <div class="col">
                        Status:
                    </div>
                    <div class="col text-right">
                        <select class="form-control" name="status" id="status" default="Herr">
                            <?php if ($user_verwalten["active"] == 1): ?>
                                <option label="Aktiv" value="1" selected="selected"></option>
                            <?php else: ?>
                                <option label="Aktiv" value="1"></option>
                            <?php endif; ?>
                            <?php if ($user_verwalten["active"] == 0): ?>
                                <option label="Deaktiviert" value="false" selected="selected"></option>
                            <?php else: ?>
                                <option label="Deaktiviert" value="false"></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Anrede:
                    </div>
                    <div class="col text-right">
                        <select class="form-control" name="anrede" id="anrede" default="Herr">
                            <?php if ($user_verwalten["anrede"] == 'Herr'): ?>
                                <option label="Herr" value="Herr" selected="selected"></option>
                            <?php else: ?>
                                <option label="Herr" value="Herr"></option>
                            <?php endif; ?>
                            <?php if ($user_verwalten["anrede"] == 'Frau'): ?>
                                <option label="Frau" value="Frau" selected="selected"></option>
                            <?php else: ?>
                                <option label="Frau" value="Frau"></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Vorname:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" width="50%" name="vorname" id="vorname" type="text"
                            placeholder="<?= htmlspecialchars($user_verwalten["vorname"]) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Nachname:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="nachname" id="nachname" type="text"
                            placeholder="<?= htmlspecialchars($user_verwalten["nachname"]) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        E-Mail:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="email" id="email" type="email"
                            placeholder="<?= htmlspecialchars($user_verwalten["email"]) ?>    ">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Benutzername:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="benutzername" id="benutzername" type="text"
                            placeholder="<?= htmlspecialchars($user_verwalten["benutzername"]) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Neues Password:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="password1" id="passwort1" type="password"
                            placeholder="Passwort">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Neues Password wiederholen:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="password2" id="passwort2" type="password"
                            placeholder="Passwort">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input class="btn btn-primary" type="reset"></input>
                    </div>
                    <div class="col text-right">
                        <input name="id" type="hidden" id="id" value="<?= htmlspecialchars($user_verwalten["id"]) ?>">
                        <input class="btn btn-primary" type="submit"></input>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <div class="col"></div>
</div>
</div>
<?php include_once 'footer.php'; ?>