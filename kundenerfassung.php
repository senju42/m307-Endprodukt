<?php
// INHALT SPEICHERN
$vorname = $_POST['vorname'] ?? "";
$nachname = $_POST['nachname'] ?? "";
$strasse = $_POST['strasse'] ?? "";
$ort = $_POST['ort'] ?? "";
$plz = $_POST['plz'] ?? "";
$kanton = $_POST['kanton'] ?? "";
$email = $_POST['email'] ?? "";
$telefon = $_POST['telefon'] ?? "";
$kundenklasse = $_POST['kundenklasse'] ?? "";

// VERBINDUNG MIT DB
// User und Passwort
$dbuser = 'root';
$dbpass = '';

//Verbindung erstellen
try {
        $db = new \PDO('mysql:host=localhost;dbname=m290_endprodukt_kunden-db', $dbuser, $dbpass);
} catch (\PDOException $e) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="de">

<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" />
        <title>Kundenerfassung</title>
</head>

<body>
        <h1>Kundenerfassung</h1>
        <form method="POST" action="erfasst.php">
                <label for="vorname">Vorname</label>
                <input type="vorname" name="vorname" id="vorname" />

                <label for="nachname">Nachname</label>
                <input type="nachname" name="nachname" id="nachname" />

                <label for="strasse">Strasse & Nr.</label>
                <input type="strasse" name="strasse" id="strasse" />

                <label for="ort">Ortsname</label>
                <input type="ort" name="ort" id="ort" />

                <label for="plz">Postleitzahl</label>
                <input type="plz" name="plz" id="plz" />

                <label for="kanton">Kanton</label>
                <input type="kanton" name="kanton" id="kanton" />

                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" />

                <label for="telefon">Telefonnummer</label>
                <input type="telefon" name="telefon" id="telefon" />
                <div>
                        <p>Kundenklasse</p>
                        <input type="radio" name="kundenklasse" id="firmenkunde" value="firmenkunde" />
                        <label for="firmenkunde"><i>Firmenkunde</i></label><br />

                        <input type="radio" name="kundenklasse" id="einzelperson" value="einzelperson" />
                        <label for="einzelperson"><i>Einzelperson</i></label><br />

                        <input type="radio" name="kundenklasse" id="partner" value="partner" />
                        <label for="partner"><i>Partner</i></label><br />

                        <input type="radio" name="kundenklasse" id="bljs" value="bljs" />
                        <label for="bljs"><i>Betriebslehrjahrstelle</i></label><br />
                </div>
                <div class="container">
                        <input type="submit" value="Speichern">
                </div>
        </form>
</body>

</html>

<!-- OLD CODE --

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kundenerfassung</title>
  </head>
  <body>
    <h1>Kundenerfassung</h1>
    <form method="POST" action="erfasst.php"">
      <label for="vorname">Vorname</label><br />
      <input type="vorname" name="vorname" id="vorname" /><br />

      <label for="nachname">Nachname</label><br />
      <input type="nachname" name="nachname" id="nachname" /><br />

      <label for="strasse">Strasse & Nr.</label><br />
      <input type="strasse" name="strasse" id="strasse" /><br />

      <label for="ort">Ortsname</label><br />
      <input type="ort" name="ort" id="ort" /><br />

      <label for="plz">Postleitzahl</label><br />
      <input type="plz" name="plz" id="plz" /><br />

      <label for="kanton">Kanton</label><br />
      <input type="kanton" name="kanton" id="kanton" /><br />

      <label for="email">E-Mail</label><br />
      <input type="email" name="email" id="email" /><br />

      <label for="telefon">Telefonnummer</label><br />
      <input type="telefon" name="telefon" id="telefon" /><br />

      <p>Kundenklasse</p>
      <input
        type="radio"
        name="kundenklasse"
        id="firmenkunde"
        value="firmenkunde"
      />
      <label for="firmenkunde"><i>Firmenkunde</i></label><br />
      
      <input
        type="radio"
        name="kundenklasse"
        id="einzelperson"
        value="einzelperson"
        />
      <label for="einzelperson"><i>Einzelperson</i></label><br />
      
      <input 
        type="radio" 
        name="kundenklasse" 
        id="partner" 
        value="partner" 
        />
      <label for="partner"><i>Partner</i></label><br />
      
      <input 
        type="radio" 
        name="kundenklasse" 
        id="bljs" 
        value="bljs" 
        />
        <label for="bljs"><i>Betriebslehrjahrstelle</i></label>
        <input type="submit" value="Speichern">
      </form>
  </body>
</html>-->