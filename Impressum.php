<?php
//in the pages displayed both for registered and unregistered users i check if user_id is set

session_start();
if (isset($_SESSION["user_id"])) {
  include_once 'header_angemeldet.php';

} else {
  include_once 'header.php';
}
?>
<div class="container-fluid text-center">
<br><h1>Impressum</h1><br>
</div>

<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6 text-center">

    <p>
    <h4>LeVille GmbH</h4>
    Adresse: Höchstädtplatz 6, 1200 Wien, Österreich<br>
    Telefon: +43 123456789<br>
    Webpage: www.hotelprojekt.com<br>
    <!--Websitename?-->
    Email: <a href="mailto:leville@lv.at">leville@lv.at</a>
    <br>
      Firmenbuchnummer: 123456a<br>
      Firmenbuchgericht: Handelsgericht Wien<br>
      UID Nummer: ATU12345678<br>
      Aufsichtsbehörde: Magistrat der Stadt Wien<br>
      Mitgliedschaft: WKO Wien, Fachverband Hotellerie, ÖHV<br>
      Gewerbeordnung für Hotellerie: <a href="https://www.ris.bka.gv.at/">www.ris.bka.gv.at</a><br>
    </p>

    <p>
    <h4>Hotelverwaltung und Medieninhaber</h4>

      <img width="100px" src="images/res/profilfoto.jpg">
      <br>Adrián Sanchez Chiner

      </p>

      <p>
      <h4>Datenschutzerklärung und Haftungshinweis</h4>
      Wir behandeln ihre Daten vertraulich und geben diese nicht an Dritte
      weiter. Für die Inhalte externer Links wird keine Haftung
      übernommen.
      </p>

      <p>
      <h4>Plattform zur Online-Streitbelegung</h4>
      Verbraucher haben die Möglichkeit, Beschwerden an die
      Online-Streitbeilegungsplattform der EU zurichten: <a
        href="http://ec.europa.eu/odr">http://ec.europa.eu/odr</a><br>
      Sie können allfällige Beschwerde auch an die oben angegebene
      E-Mail-Adresse richten.<br>
      </p>

      <p>
        <a href="index.php">zurück zur Startseite</a>
      </p>
    </div>
    <div class="col"></div>
  </div>
    <?php include_once 'footer.php'; ?>