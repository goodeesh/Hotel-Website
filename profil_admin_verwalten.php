<?php
//the same as profil from user but made for the admin
session_start();
include_once 'header_angemeldet.php';
  $mysqli = require __DIR__ . "/config/database.php";
$stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();
$result = $stmt->get_result();
$user_verwalten = $result->fetch_assoc();

$directory = "C:/xampp/htdocs/hotel/images/" . $user_verwalten['benutzername'] . ".png";
if ($user_verwalten["active"] == 1) {
    $status = "Aktiv";
} else {
    $status = "Deaktiviert";
}
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
    <div class="col-8 col-lg-6">
        <div id="card">
            <div class="row">
                <div class="col">
                    Status:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($status) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Anrede:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user_verwalten["anrede"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Vorname:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user_verwalten["vorname"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Nachname:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user_verwalten["nachname"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    E-Mail:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user_verwalten["email"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    Benutzername:
                </div>
                <div class="col text-end">
                    <?= htmlspecialchars($user_verwalten["benutzername"]) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="User_Verwaltung.php">zurück zur User Verwaltung</a>
                </div>
                <div class="col text-end">
                    <form action="profilupdate_admin.php" method="post">
                        <input name="id" type="hidden" id="id" value="<?= htmlspecialchars($user_verwalten["id"]) ?>">

                        <input class="btn btn-primary" type="submit" value="Profil Information ändern"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
</div>
<?php include_once 'footer.php'; ?>