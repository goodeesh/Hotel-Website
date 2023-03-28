<?php
session_start();
include_once 'header_angemeldet.php';
?>
<br>
<div class="container-fluid text-center">
</div>
<br>
<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6" style="padding: 20px;">
    <div id="card">
      <form enctype="multipart/form-data" action="newpost.php" method="post">
        <label for="title">Überschrift:</label>
        <input required class="form-control" type="text" id="title" name="title" required>
        <br>
        <label for="content">Inhalt:</label>
        <textarea required maxlength="1024" class="form-control" id="inhalt" name="inhalt" required></textarea>
        <br>
        <label for="Hochladen">Photo wählen</label><br><br>
        <input  class="btn btn-primary" type="file" name="picture" accept="image/png, image/gif, image/jpeg" required><br><br>
        <input  class="btn btn-primary" type="submit" value="Veröffentlichen">
      </form>
    </div>
    <div class="col"></div>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>