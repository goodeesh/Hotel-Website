<?php
//in the pages displayed both for registered and unregistered users i check if user_id is set
session_start();
if (isset($_SESSION["user_id"])) {
  include_once 'header_angemeldet.php';
} else {
  include_once 'header.php';
}
?>
<br>
<h2 class="container-fluid text-center">Reservierung und Bedienung der Website</h2>
<br>
<!--      columns start -->
<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6">
    <!-- accordion starts -->
    <div class="accordion accordion-flush card">
      <!-- first item -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Wie kann ich eine Reservierung vornehmen?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
          <div class="accordion-body">
            Um eine Reservierung vorzunehmen ist zunächst eine <a href="Registrierung.php">Registrierung</a> auf
            unser Website notwendig. Anschließend können Sie sich
            unter <a href="Anmeldung.php">Anmeldung</a> anmelden
            und über unser Reservierungstool
            <!-- Link einfügen, wenn vorhanden-->
            eine Reservierung vornehmen.</p>
          </div>
        </div>
      </div>
      <!-- end first item -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Wie erfolgt die Registrierung auf der Homepage?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo">
          <div class="accordion-body">Die Registrierung erfolgt über unser
            <a href="Registrierung.php">Registrierungsformular</a>.
            Selbstverständlich werden Ihre Daten vertraulich
            behandelt und nicht an Dritte weitergegeben.
          </div>
        </div>
      </div>
      <!-- end second item -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Warum muss ich mich registrieren?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree">
          <div class="accordion-body">Ohne Registrierung können Sie die Newsbeiträge,
            Hilfeseite und das Impressum unserer Website aufrufen.
            Eine Reservierung kann allerdings nur von registrierten
            Personen vorgenommen werden.
          </div>
        </div>
      </div>
      <!-- end third one -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            Wie kann ich meine Reservierungsdetails einsehen?
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour">
          <div class="accordion-body">Ihre Reservierungsdetails können sie bei Reservierungen ansehen.
          </div>
        </div>
      </div>
      <!-- end 4 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
            Wie kann ich meine Stammdaten ändern?
          </button>
        </h2>
        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5">
          <div class="accordion-body">Ihre Stammdaten können Sie beim Profil einsehen und gegebenenfalls auch ändern.
            <? endif?>
          </div>
        </div>
      </div>
      <!-- end 5 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
            An wen kann ich mich bei Fragen wenden?
          </button>
        </h2>
        <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6">
          <div class="accordion-body">Gerne können Sie sich bei Fragen telefonisch oder per
            Email an uns wenden. Unsere Kontaktdaten finden sie <a href="Impressum.php">hier</a>.
          </div>
        </div>
      </div>
      <!-- end 6 -->
    </div>
  </div>
  <div class="col"></div>
</div>
<!--     Ende columns -->

<!-- second section FAQ -->
<br>
<h2 class="container-fluid text-center">Aufenthalt und Stornierung</h2>
<br>
<!-- start containers 2 -->
<div class="row">
  <div class="col"></div>
  <div class="col-8 col-lg-6">

    <!-- accordion starts -->
    <div class="accordion accordion-flush card">
      <!-- first item -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse1a" aria-expanded="false" aria-controls="flush-collapse1a">
            Ist es möglich eine Reservierung zu stornieren?
          </button>
        </h2>
        <div id="flush-collapse1a" class="accordion-collapse collapse" aria-labelledby="flush-heading1a">
          <div class="accordion-body">
            Es ist möglich bis zwei Tage vor Anreise die Reservierung kostenfrei zu stornieren.
          </div>
        </div>
      </div>
      <!-- end first item -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse2a" aria-expanded="false" aria-controls="flush-collapse2a">
            Muss die Zahlung bereits bei Reservierung erfolgen?
          </button>
        </h2>
        <div id="flush-collapse2a" class="accordion-collapse collapse" aria-labelledby="flush-heading2a">
          <div class="accordion-body">Die Zahlung wird erst am Ende des Aufenthalts fällig. Bei
            der Reservierung ist es jedoch notwendig eine Kreditkartenummer anzugeben.
          </div>
        </div>
      </div>
      <!-- end second item -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse3a" aria-expanded="false" aria-controls="flush-collapse3a">
            Ist Barzahlung möglich?
          </button>
        </h2>
        <div id="flush-collapse3a" class="accordion-collapse collapse" aria-labelledby="flush-heading3a">
          <div class="accordion-body">Barzahlung ist vor Ort möglich.
          </div>
        </div>
      </div>
      <!-- end third one -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse4a" aria-expanded="false" aria-controls="flush-collapse4a">
            Sind zusätzliche Kosten (wie z.B. Steuern, Ortstaxe) bereits im Preis inkludiert?
          </button>
        </h2>
        <div id="flush-collapse4a" class="accordion-collapse collapse" aria-labelledby="flush-heading4a">
          <div class="accordion-body">Ja, alle zusätzliche Kosten sind bereits im Zimmerpreis inkludiert.
          </div>
        </div>
      </div>
      <!-- end 4 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse5a" aria-expanded="false" aria-controls="flush-collapse5a">
            Ist das Früshtuck im Preis inkludiert?
          </button>
        </h2>
        <div id="flush-collapse5a" class="accordion-collapse collapse" aria-labelledby="flush-heading5a">
          <div class="accordion-body">Nein, das Frühstück ist nicht im Zimmerpreis inkludiert.
            Frühstück kann für 8 Euro/Person/Tag im Zuge der
            Reservierung dazugebucht werden.
          </div>
        </div>
      </div>
      <!-- end 5 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse6a" aria-expanded="false" aria-controls="flush-collapse6a">
            Bis zu welcher Uhrzeit sind die Zimmer zu räumen?
          </button>
        </h2>
        <div id="flush-collapse6a" class="accordion-collapse collapse" aria-labelledby="flush-heading6a">
          <div class="accordion-body">Check-out ist bis 11:00 Uhr.
          </div>
        </div>
      </div>
      <!-- end 6 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse7a" aria-expanded="false" aria-controls="flush-collapse7a">
            Sind Haustiere im Hotel erlaubt?
          </button>
        </h2>
        <div id="flush-collapse7a" class="accordion-collapse collapse" aria-labelledby="flush-heading7a">
          <div class="accordion-body">Gerne können Sie Ihren Hund mitbringen. Die Kosten dafür
            betragen 10 Euro/Hund/Tag. Wir ersuchen Sie die Mitnahme
            ihres Tieres bereits bei der Reservierung
            bekanntzugeben.
          </div>
        </div>
      </div>
      <!-- end 7 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse8a" aria-expanded="false" aria-controls="flush-collapse8a">
            Was sind die Frühstückszeiten?
          </button>
        </h2>
        <div id="flush-collapse8a" class="accordion-collapse collapse" aria-labelledby="flush-heading8a">
          <div class="accordion-body">Das Frühstück findet in der Zeit von 7.00 Uhr bis 10.30
            Uhr statt.
          </div>
        </div>
      </div>
      <!-- end 8 -->
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse9a" aria-expanded="false" aria-controls="flush-collapse9a">
            Gibt es Parkplätze vor Ort?
          </button>
        </h2>
        <div id="flush-collapse9a" class="accordion-collapse collapse" aria-labelledby="flush-heading9a">
          <div class="accordion-body">Ja, kostenpflichtige Parkplätze sind verfügbar und können
            bei Reservierung dazugebucht werden. Der Preis beträgt
            15 Euro/Fahrzeug/Tag. Die Parkplatzkosten sind nicht im
            Zimmerpreis inkludiert.
          </div>
        </div>
      </div>
      <!-- end 9 -->
    </div>
    <!-- end accordion -->
  </div>
  <div class="col"></div>
</div>
<!-- end containers 2 -->
<?php include_once 'footer.php'; ?>