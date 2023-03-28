<?php
include_once 'header_angemeldet.php';
//some double checkes from the form, sicher ist sicher
if (empty($_POST["title"])) {
  die("Überschrift is leer, bitte schreiben Sie ein Überschrift.");
}
if (empty($_POST["inhalt"])) {
  die("Inhalt kann nicht leer sein.");
}
if (empty($_FILES["picture"])) {
  die("Der Artikel kann nicht ohne Photo gepostet werden.");
}
  $picture = $_FILES["picture"];
  $allowed = array('image/png', 'image/jpg', 'image/jpeg');
  $random_name = mt_rand();      
  if (in_array($picture["type"], $allowed)) {
      // Typ vom File lesen und nach png welchseln
      if ($picture["type"] == 'image/png') {
          $source_image = imagecreatefrompng($picture["tmp_name"]);
      } else if ($picture["type"] == 'image/jpg' || $picture["type"] == 'image/jpeg') {
          $source_image = imagecreatefromjpeg($picture["tmp_name"]);
      }
      $destination = "C:/xampp/htdocs/hotel/uploads/news/" . $random_name . ".png";
      // Width und Height lesen und speichern
      $width = imagesx($source_image);
      $height = imagesy($source_image);

      // neuen Weidht und Height
      $new_width = 720;
      $new_height = 480;

      // Neu Bild creieren
      $destination_image = imagecreatetruecolor($new_width, $new_height);
      imagecopyresampled($destination_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

      // Speichern von neuen Bild
      imagepng($destination_image, $destination, 9);
  } else {
      echo "Fehler beim Upload!";
  }


//connection to database using file database.php
  $mysqli = require __DIR__ . "/config/database.php";

$stmt = $mysqli->stmt_init();
//insert new into database
$sql = "INSERT INTO news (Überschrift, Artikel, photo)
          VALUES (?, ?, ?)";

if (!$stmt->prepare($sql)) {
  die("SQL error: " . $mysqli->error);
}
$endung = ".png";
$random_name = $random_name.$endung;
$stmt->bind_param(
  "sss",
  $_POST["title"],
  $_POST["inhalt"],
  $random_name
);
$stmt->execute();

?>
<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id="card">
      <p class="text-center"> Einen neuen Artikel wurde gepostet.
        <br><br>
        <button class="btn btn-primary"><a href="News.php" style="color: black;">zurück zur News-seite</a> </button>
      </p>

    </div>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>