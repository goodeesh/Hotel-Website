<?php
//connect to the database and register the user in the variable $user, which will be used during the website
$mysqli = require __DIR__ . "/config/database.php";
$stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Le Ville</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/res/logo.png" alt="Bootstrap" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="News.php">News</a>
                    </li>
                    <?php if (isset($user['benutzername'])): ?>
                        <?php if ($user['benutzername'] != 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="profil.php">Profil</a>
                            </li>
                        <?php endif ?>
                    <?php endif ?>

                    <?php if (isset($user['benutzername'])): ?>
                        <?php if ($user['benutzername'] == 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="User_verwaltung.php">User Verwaltung</a>
                            </li>
                        <?php endif ?>
                    <?php endif ?>

                    <?php if (isset($user['benutzername'])): ?>
                        <?php if ($user['benutzername'] != 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="reservieren.php">Reservieren</a>
                            </li>
                        <?php endif ?>
                    <?php endif ?>
                    <!-- SI ES ADMIN, ACCEDE A LA PAGINA DONDE VER TODAS LAS RESERVAS -->
                    <?php if (isset($user['benutzername'])): ?>
                        <?php if ($user['benutzername'] != 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="Reservierungen.php">Reservierungen</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="Reservierungen_admin.php">Reservierungen</a>
                            </li>
                        <?php endif ?>
                    <?php endif ?>

                    <li class="nav-item">
                        <a onclick="return confirm('Sind Sie sicher, dass Sie sich abmelden möchten?')"
                            class="nav-link active" href="logout.php">Abmelden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Hilfe.php">Frequently Asked Questions (FAQ)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Impressum.php">Impressum</a>
                    </li>

            </div>
        </div>
    </nav>
</head>

<body style="background-color: rgb(250, 235, 219);">