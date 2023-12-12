<?php
// INHALT SPEICHERN
$vorname = $_POST['vorname'] ?? "";
$nachname = $_POST['nachname'] ?? "";
$strasse = $_POST['strasse'] ?? "";
$status = $_POST['status'] ?? "";
$ort = $_POST['ort'] ?? "";
$kontakt = $_POST['kontakt'] ?? "";
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

// SQL-Statement für Kunden
$sqlKunden = "
    INSERT INTO `kunden` (`Kunden_ID`, `Vorname`, `Nachname`, `Strasse&Nummer`, `status`, `Kontakt_Kontakt_ID`, `Wohnort_Wohnort_ID`, `Klasse_Klasse_ID`) 
    VALUES (NULL, :Vorname, :Nachname, :Strasse, :Status, :Kontakt, :Ort, :Klasse);
";

// SQL-Statement für Klasse
$sqlKlasse = "
    INSERT INTO `klasse` (`Klasse_ID`, `Klasse_Name`)
    VALUES (NULL, :Klasse_Name);
";

// SQL-Statement für Kontakt
$sqlKontakt = "
    INSERT INTO `kontakt`(`Kontakt_ID`, `Email`, `Telefon`)
    VALUES (NULL, :Email, :Telefon);
";

// SQL-Statement für Wohnort
$sqlWohnort = "
    INSERT INTO `wohnort`(`Wohnort_ID`, `Ortsname`, `Postleitzahl`, `Kanton`)
    VALUES (NULL, :Ortsname, :Postleitzahl, :Kanton);
";

//Abfrage abschicken
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kunden-Daten einfügen
    $stmtKunden = $db->prepare($sqlKunden);
    $stmtKunden->bindParam(':Vorname', $vorname);
    $stmtKunden->bindParam(':Nachname', $nachname);
    $stmtKunden->bindParam(':Strasse', $strasse);
    $stmtKunden->bindParam(':Status', $status);
    $stmtKunden->bindParam(':Kontakt', $kontakt);
    $stmtKunden->bindParam(':Ort', $ort);
    $stmtKunden->bindParam(':Klasse', $kundenklasse);
    $stmtKunden->execute();

    // Klasse-Daten einfügen
    $stmtKlasse = $db->prepare($sqlKlasse);
    $stmtKlasse->bindParam(':Klasse_Name', $kundenklasse);
    $stmtKlasse->execute();

    // Kontakt-Daten einfügen
    $stmtKontakt = $db->prepare($sqlKontakt);
    $stmtKontakt->bindParam(':Email', $kontakt);
    $stmtKontakt->bindParam(':Telefon', ''); // Kein Feld im Formular
    $stmtKontakt->execute();

    // Wohnort-Daten einfügen
    $stmtWohnort = $db->prepare($sqlWohnort);
    $stmtWohnort->bindParam(':Ortsname', $ort);
    $stmtWohnort->bindParam(':Postleitzahl', ''); // Kein Feld im Formular
    $stmtWohnort->bindParam(':Kanton', ''); // Kein Feld im Formular
    $stmtWohnort->execute();
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

                <label for="strasse">Strasse & Hausnummer</label>
                <input type="strasse" name="strasse" id="strasse" />

                <label for="status">Status</label>
                <input type="status" name="status" id="status" />

                <!-- <label for="strasse">Strasse & Nr.</label>
                <input type="strasse" name="strasse" id="strasse" /> -->

                <label for="ort">Wohnort</label>
                <!-- <input type="ort" name="ort" id="ort" /> -->
                <select name="ort">
                        <?php
                        $sql  = "SELECT * FROM `wohnort`";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        while ($lp = $stmt->fetch()) {
                                echo '<option value="' . $lp['Wohnort_ID'] . '">' . $lp['Ortsname'] . '</option>';
                        } ?>
                </select>
                <!-- <label for="plz">Postleitzahl</label>
                <input type="plz" name="plz" id="plz" /> -->

                <!-- <label for="kanton">Kanton</label>
                <input type="kanton" name="kanton" id="kanton" /> -->

                <label for="kontakt">Kontakt</label>
                <select name="kontakt">
                        <?php
                        $sql  = "SELECT * FROM `kontakt`";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        while ($lp = $stmt->fetch()) {
                                echo '<option value="' . $lp['Kontakt_ID'] . '">' . $lp['Email'] . '</option>';
                        } ?>
                </select>

                <!-- <label for="telefon">Telefonnummer</label>
                <input type="telefon" name="telefon" id="telefon" /> -->
                <div>
                        <p>Kundenklasse</p>
                        <input type="radio" name="kundenklasse" id="firmenkunde" value="1" />
                        <label for="firmenkunde"><i>Firmenkunde</i></label><br />

                        <input type="radio" name="kundenklasse" id="einzelperson" value="2" />
                        <label for="einzelperson"><i>Einzelperson</i></label><br />

                        <input type="radio" name="kundenklasse" id="partner" value="3" />
                        <label for="partner"><i>Partner</i></label><br />

                        <input type="radio" name="kundenklasse" id="bljs" value="4" />
                        <label for="bljs"><i>Betriebslehrjahrstelle</i></label><br />
                </div>
                <div class="container">
                        <input type="submit" value="Speichern">
                </div>
        </form>
</body>

</html>