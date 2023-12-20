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
        th, td {
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
    <h1>Erfasste Kunden</h1><br>
    <a href="kundenerfassung.php">Kunde erfassen</a><br>

    <?php
    $dbuser = 'root';
    $dbpass = '';
    try {
        $db = new \PDO('mysql:host=localhost;dbname=m290_endprodukt_kunden-db', $dbuser, $dbpass);
    } catch (\PDOException $e) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
    }

    $sql = "SELECT * FROM kunden";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "<table>";
    echo "<tr><th>Name</th><th>Vorname</th><th>Strasse & Hausnummer</th><th>Status</th><th>Kundenklasse</th></tr>";
    while ($kunden = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($kunden['Nachname']) . "</td>";
        echo "<td>" . htmlspecialchars($kunden['Vorname']) . "</td>";
        echo "<td>" . htmlspecialchars($kunden['Strasse&Nummer']) . "</td>"; // Achten Sie auf den korrekten Spaltennamen in Ihrer Datenbank.
        echo "<td>" . htmlspecialchars($kunden['status']) . "</td>";
        echo "<td>" . htmlspecialchars($kunden['Klasse_Klasse_ID']) . "</td>"; // Achten Sie auf den korrekten Spaltennamen in Ihrer Datenbank.
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
