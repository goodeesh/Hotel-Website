<?php
session_start();
if (isset($_SESSION["user_id"])) {
  include_once 'header_angemeldet.php';
} else {
  include_once 'header.php';
}
?>
<br>
<div class="container-fluid text-center">
  <h1>Reservierung</h1>
</div>

<!-- https://www.w3schools.com/tags/att_input_pattern.asp pasword required characters -->
<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6">
    <div id="card">
    <form action="reservieren_Daten.php" method="post">
      <label for="check-in_date">Von:</label>
      <input class="form-control" width="50%" name="check-in_date" id="check-in_date" type="date" id="check-in_date"
        name="date"><br>

      <label for="check-out_date">Bis:</label>
      <input class="form-control" width="50%" name="check-out_date" id="check-out_date" type="date" id="check-out_date"
        name="date"><br>

      <label for="time">Check-in Uhrzeit:</label>
      <input min="0" max="23" class="form-control" width="50%" name="time" id="time" type="time" value="11:00" id="time"
        name="time"><br>

      <label for="guests">Anzahl der Gäste (max 4):</label>
      <input min="1" max="4" class="form-control" width="50%" name="guests" id="guests" type="number" id="guests"
        name="guests"><br>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div width="80%" class="carousel-item active">
                        <img src="images/res/zimmer1.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="images/res/zimmer2.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="images/res/zimmer3.jpg" class="d-block w-100">
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

      <label for="zimmer">Welches Zimmer möchten Sie? (1-3):</label>
      <input min="1" max="3" class="form-control" width="50%" name="zimmer" id="zimmer" type="number" id="guests"
        name="guests"><br>
      <label for="Frühstück">Frühstück:</label>
      <input name="Frühstück" id="Frühstück" type="checkbox" value="1"><br>
      <label for="Parkplatz">Parkplatz:</label>
      <input name="Parkplatz" id="Parkplatz" type="checkbox" value="1"><br>
      <label for="Haustiere">Haustiere:</label>
      <input name="Haustiere" id="Haustiere" type="checkbox" value="1"><br>
      <br>
      <input class="btn btn-primary" type="submit" value="Submit">
    </form>
    </div>
  </div>
  <div class="col"></div>
</div>
<br><br>
<?php include_once 'footer.php'; ?>