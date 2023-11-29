<?php

// INHALT SPEICHERN

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$strasse = $_POST['strasse'];
$ort = $_POST['ort'];
$plz = $_POST['plz'];
$kanton = $_POST['kanton'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$kundenklasse = $_POST['kundenklasse'];

// ARRAYS DEFINIEREN
// vorname
if( array_key_exists('vorname',$_POST))
        $vorname = $_POST['vorname'];
else
        $vorname = '';
// nachname
if( array_key_exists('nachname',$_POST))
        $nachname = $_POST['nachname'];
else
        $nachname = '';
// strasse
if( array_key_exists('strasse',$_POST))
        $strasse = $_POST['strasse'];
else
        $strasse = '';
// ort
if( array_key_exists('ort',$_POST))
        $ort = $_POST['ort'];
else
        $ort = '';
// plz
if( array_key_exists('plz',$_POST))
        $plz = $_POST['plz'];
else
        $plz = '';
// kanton
if( array_key_exists('kanton',$_POST))
        $kanton = $_POST['kanton'];
else
        $kanton = '';
// email
if( array_key_exists('email',$_POST))
        $email = $_POST['email'];
else
        $email = '';
// telefon
if( array_key_exists('telefon',$_POST))
        $telefon = $_POST['telefon'];
else
        $telefon = '';
// kundenklasse
if( array_key_exists('kundenklasse',$_POST))
        $kundenklasse = $_POST['kundenklasse'];
else
        $kundenklasse = '';
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
        <input
          type="radio"
          name="kundenklasse"
          id="firmenkunde"
          value="firmenkunde"
        />
        <label for="firmenkunde"><i>Firmenkunde</i></label
        ><br />
        
        <input
          type="radio"
          name="kundenklasse"
          id="einzelperson"
          value="einzelperson"
        />
        <label for="einzelperson"><i>Einzelperson</i></label
        ><br />
        
        <input
          type="radio"
          name="kundenklasse"
          id="partner"
          value="partner"
        />
        <label for="partner"><i>Partner</i></label
        ><br />
        
        <input
          type="radio"
          name="kundenklasse"
          id="bljs"
          value="bljs"
        />
        <label for="bljs"><i>Betriebslehrjahrstelle</i></label
        ><br />
      </div>
      <div class="container">
      <input type="submit" value="Speichern">      </div>
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