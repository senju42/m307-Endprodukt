<!DOCTYPE html>
<html lang="de">

<head>
    <!-- Deklaration des HTML-Dokumenttyps und der Sprache -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenliste</title>
    <style>
        /* Styling für das Aussehen der Seite */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #C5DF9A;
        }

        a {
            text-decoration: none;
            padding: 10px;
            background-color: #8CBF35;
            color: #fff;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <h1>Erfasste Kunden</h1>

    <!-- Kundeninformationen probe -->
    <!-- $kunden = array(
        array("Mannhart", "Manfred", "Fidlistrasse 48", "ST.Gallen", "9000", "ST.Gallen", "manfred.mannhart@gmail.com", "079 133 80 90", "Einzelperson", "Aktiv"),
    ); -->

    <?php
    //VERBINDUNG DB
    // User und Passwort
    $dbuser = 'Besucher';
    $dbpass = '1-4m-h3r3t0r34d';

    //Verbindung erstellen
    try {
        $db = new \PDO('mysql:host=localhost;dbname=m290_endprodukt_kunden-db', $dbuser, $dbpass);
    } catch (\PDOException $e) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
    }
    ?>

    <table>
        <!-- Tabelle zur Anzeige der Kundeninformationen -->
        <tr>
            <th>Name</th>
            <th>Vorname</th>
            <th>Strasse & Hausnummer</th>
            <th>Status</th>
            <th>Kundenklasse</th>
        </tr>
        <?php
        $sql = "SELECT * FROM kunden";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        while ($kunden = $stmtKunden->fetch()) {
            $vorname = $kunden["Vorname"];
            $nachname = $kunden['Nachname'];
            $strasse = $kunden['Strasse'];
            $status = $kunden['Status'];
            $kontakt = $kunden['Kontakt'];
            $ort = $kunden['Ort'];
            $kundenklasse = $kunden['Klasse'];

            echo "<tr><td>$vorname</td><td>$nachname</td><td>$strasse</td><td>$status</td><td>$kontakt</td><td>$ort</td><td>$kundenklasse</td></tr>";
        }
        ?>
    </table>
</body>
<!-- Link zur Seite für die Erfassung neuer Kunden -->
<a href="kundenerfassung.php">Kunde erfassen</a>

</html>