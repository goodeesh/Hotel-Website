<?php
//here the user see his data
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
    <div class="col-8 col-lg-6">
        <div id="card">
            <div class="row">
                <div class="col">
                    Anrede:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user["anrede"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Vorname:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user["vorname"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Nachname:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user["nachname"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    E-Mail:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user["email"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Benutzername:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user["benutzername"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a href="index.php">zurück zur Startseite</a>
                </div>
                <div class="col text-end">
                    <a href="profilupdate.php">Profil Information ändern</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
</div>
<?php include_once 'footer.php'; ?>