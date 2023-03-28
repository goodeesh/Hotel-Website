<?php
//in case there is a post[id] then i will set the user_verwalten to save the picture with the right user
session_start();
include_once 'header_angemeldet.php';
  $mysqli = require __DIR__ . "/config/database.php";
if(isset($_POST["id"])){
$stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $_POST["id"]);
$stmt->execute();
$result = $stmt->get_result();
$user_verwalten = $result->fetch_assoc();
}
$directory = "C:/xampp/htdocs/hotel/images/" . $user['benutzername'] . ".png";
?>
    <div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6"><br><br><br><br><br>
    <div id="card">
      <p class="text-center"> 
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $picture = $_FILES["picture"];
            $allowed = array('image/png', 'image/jpg', 'image/jpeg');
            //here i check if there i manage another user
            if(isset($user_verwalten)){
            $destination = "C:/xampp/htdocs/hotel/images/" . $user_verwalten['benutzername'] . ".png";
            } else {
                $destination = "C:/xampp/htdocs/hotel/images/" . $user['benutzername'] . ".png";
            }
            if (in_array($picture["type"], $allowed)) {
                // Typ vom File lesen und nach png welchseln
                if ($picture["type"] == 'image/png') {
                    $source_image = imagecreatefrompng($picture["tmp_name"]);
                } else if ($picture["type"] == 'image/jpg' || $picture["type"] == 'image/jpeg') {
                    $source_image = imagecreatefromjpeg($picture["tmp_name"]);
                }
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
                echo "Datei wurde erfolgreich hochgeladen!";
            } else {
                echo "Fehler beim Upload!";
            }
        } ?>

    </div>
  </div>
  <div class="col"></div>
</div>