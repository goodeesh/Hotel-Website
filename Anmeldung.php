<?php include_once 'header.php';
$is_invalid = false;
//here we log in connecting to the database and check if the email exist in our database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $mysqli = require __DIR__ . "/config/database.php";
  $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
  $stmt->bind_param("s", $_POST['email']);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  if ($user) {
    //i check if this account is activated
    if ($user["active"] == 0){
      die("Diesen Konto wurde deaktiviert. Bitte kontaktieren Sie per E-mail um der Konto wieder zu eröffnen.");
    }
    //check password with hash function
    if (password_verify($_POST["password"], $user["password_hash"])) {
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("Location: index.php");
      exit;
    }
    ;
  }
  $is_invalid = true;
}
?>
<div class="container-fluid text-center">
  <br>
  <h1>Anmeldung</h1>
</div><br><br>
<div class="container-fluid text-center">
  <h5>
    <?php if ($is_invalid) {
      //In case something didn't worked we print this message
      echo "Die Daten stimmen nicht, bitte versuchen Sie es nochmal";
    } ?>
  </h5>
</div>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6">
    <form method="post">
      <div class="form-outline mb-4">
        <label for="email" class="form-label" for="form2Example1">Email address</label>
        <input name="email" type="email" id="form2Example1" class="form-control"
          value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" />
      </div>
      <div class="form-outline mb-4">
        <label for="password" class="form-label" for="form2Example2">Password</label>
        <input name="password" type="password" id="form2Example2" class="form-control" />
      </div>
      <div class="row mb-4">
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Login</button>
      <div class="text-center">
        <p>Noch nicht registriert? <a href="Registrierung.html">Hier!</a></p>
      </div>
    </form>
  </div>
  <div class="col"></div>
</div>
<?php include_once 'footer.php'; ?>