<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Deklaration des HTML-Dokumenttyps und der Sprache -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenliste</title>
    <style>
.erfasst-container {
    width: 90%;
    max-width: 500px;
    padding: 20px;
    background-color: #ffffff;
    border: 2px solid #8cbf35;
    border-radius: 10px;
    text-align: left;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin-top: 20px; /* Abstand zum oberen Bildschirmrand */
}
 
/* Stile für Listen, damit sie wie im Formular aussehen */
.erfasst-container ul {
    list-style-type: none;
    padding: 0;
    margin: 0; /* Entfernt den Standard-Abstand */
}
 
.erfasst-container li {
    background-color: #f9f9f9; /* Leichter Hintergrund für jede Zeile */
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #8cbf35;
    border-radius: 40px; /* Abgerundete Ecken wie im Formular */
}
 
/* Stile für die Schaltflächen, um Konsistenz zu gewährleisten */
.erfasst-container a {
    margin-bottom: 20px; /* Abstand zwischen den Schaltflächen */
}
 
@media only screen and (max-width: 600px) {
    .erfasst-container {
        width: 100%;
        max-width: none;
    }
}
    </style>
</head>
<body>
    <h1>Erfasste Kunden</h1><br>
    <a href="kundenerfassung.php">Kunde erfassen</a><br>

    <?php
    $dbuser = 'lhuber_m307';
    $dbpass = 'lhuber_m307';
    try {
        $db = new \PDO('mysql:host=localhost;dbname=lhuber_m307', $dbuser, $dbpass);
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
