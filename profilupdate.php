<?php
//profilupdate for the user

session_start();

include_once 'header_angemeldet.php';

$directory = "C:/xampp/htdocs/hotel/images/" . $user['benutzername'] . ".png";

?>
<br>
<div class="container-fluid text-center">
    <h1>Profil</h1><br>
    <?php if (file_exists($directory)): ?>
        <img id="profilphoto" width="100px"
            src="images/<?= htmlspecialchars($user["benutzername"]) ?>.png?t=<?php echo time() ?>">
    <?php else: ?>
        <img id="profilphoto" width="100px" src="images/res/default.jpg
">
    <?php endif ?>

    <form enctype="multipart/form-data" method="post" action="photo_update.php">
        <label for="Hochladen">Profilphoto ändern</label>
        <input type="file" name="picture" accept="image/png, image/gif, image/jpeg">
        <input type="submit" value="Hochladen">
    </form>
</div>
<br>

<div class="row">
    <div class="col"></div>

    <div class="col-8 col-lg-6" style="padding: 20px;">
        <div id="card">
            <form action="Daten_updaten.php" method="post">
                <div class="row">
                    <div class="col">
                        Anrede:
                    </div>
                    <div class="col text-right">
                        <select class="form-control" name="anrede" id="anrede" default="Herr">
                            <?php if ($user["anrede"] == 'Herr'): ?>
                                <option label="Herr" value="Herr" selected="selected"></option>
                            <?php else: ?>
                                <option label="Herr" value="Herr"></option>
                            <?php endif; ?>
                            <?php if ($user["anrede"] == 'Frau'): ?>
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
                            placeholder="<?= htmlspecialchars($user["vorname"]) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Nachname:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="nachname" id="nachname" type="text"
                            placeholder="<?= htmlspecialchars($user["nachname"]) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        E-Mail:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="email" id="email" type="email"
                            placeholder="<?= htmlspecialchars($user["email"]) ?>    ">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Benutzername:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="benutzername" id="benutzername" type="text"
                            placeholder="<?= htmlspecialchars($user["benutzername"]) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Alte Password:
                    </div>
                    <div class="col text-right">
                        <input class="form-control" name="password" id="passwort" type="password"
                            placeholder="Passwort">
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
                    <p class="alert">Ändern Sie eine oder mehrer Behfele. Um die neue Information einzufügen muss immer
                        das aktuelle Password eingegeben werden.</p>
                    <div class="col">
                        <input class="btn btn-primary" type="reset"></input>
                    </div>
                    <div class="col text-right">
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