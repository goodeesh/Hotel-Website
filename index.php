<?php
//in the pages displayed both for registered and unregistered users i check if user_id is set

session_start();
setcookie('visited', 'yes', 0x7FFFFFFF);

if (isset($_SESSION["user_id"])) {
    include_once 'header_angemeldet.php';

} else {
    include_once 'header.php';
}

?>
<br><br>
<div class="row">
    <div class="col"></div>
    <div class="col-8 col-lg-6">
        <div class="text-center">
            <?php if (!isset($_COOKIE['visited'])): ?>
            <div class="row">
                <div class="col"></div>
                <div class="col-8 col-lg-6">
                    <p id="card">Erste mal auf die Website unseres Hotels? Holen Sie sich gleich ein 15% Rabatt für die
                        erste
                        Reservierung! <br> <a class="nav-link active" aria-current="page"
                            href="Registrierung.php">Klicken Sie
                            hier.</a>
                </div>
                <div class="col"></div>
            </div>
            <?php endif; ?>
            <h1 class="text-center">Hotel Le Ville<img src="images/res/logo.png" width="80" height="60"></h1>

            <?php if (isset($user)): ?>
            <p>Willkommen <?= htmlspecialchars($user["vorname"]) ?>. Sie sind gerade angemeldet.</p><br><br>
            <?php else: ?>
            <div>
                Willkommen zurück auf der Seite unseres Hotels!<br><br>
                <!-- <button class="btn btn-primary"><a href="Registrierung.php" style="color: black;">
                        Registrierungsformular</a> </button>
                <button class="btn btn-primary"><a href="Anmeldung.php" style="color: black;">Anmeldung</a> </button> -->
            </div>
            <?php endif; ?>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/res/LeVille.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="images/res/campo.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="images/res/bad.jpg" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev btn" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next btn" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br>
        </div>
    </div>
    <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>