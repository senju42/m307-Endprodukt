<?php
$id = $_GET['id'];

$dbuser = 'lhuber_m307';
$dbpass = 'lhuber_m307';

try {
    $db = new PDO('mysql:host=localhost;dbname=lhuber_m307', $dbuser, $dbpass);
} catch (PDOException $e) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
}

$sql = "SELECT * FROM `kunden` WHERE `Kunden_ID` = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$kunde = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunde erfasst</title>
    <link rel="stylesheet" href="style.css" />
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        a {
            display: inline-block;
            padding: 12px 24px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #4caf50;
            border-radius: 4px;
            background-color: #4caf50;
            transition: background-color 0.3s ease-in-out;
            margin-top: 20px;
        }

        a:hover {
            background-color: #45a049;
        }

</style>
</head>
<body>
    <h1>Kunde erfolgreich erfasst</h1>
    <p>Folgende Daten wurden gespeichert:</p>
    <?php if ($kunde): ?>
        <ul>
            <li>ID: <?php echo htmlspecialchars($kunde['Kunden_ID']); ?></li>
            <li>Vorname: <?php echo htmlspecialchars($kunde['Vorname']); ?></li>
            <li>Nachname: <?php echo htmlspecialchars($kunde['Nachname']); ?></li>
            <li>Strasse & Hausnummer: <?php echo htmlspecialchars($kunde['Strasse&Nummer']); ?></li>
            <li>Status: <?php echo htmlspecialchars($kunde['status']); ?></li>
            <li>Kundenklasse: <?php echo htmlspecialchars($kunde['Klasse_Klasse_ID']); ?></li>
            <!-- Fügen Sie hier weitere Felder hinzu, die Sie anzeigen möchten -->
        </ul>
    <?php else: ?>
        <p>Keine Daten gefunden.</p>
    <?php endif; ?>
    <a href="index.php">Zurück zur Kundenliste</a><br>
    <a href="kundenerfassung.php">Weiteren Kunden erfassen</a>
</body>
</html>
