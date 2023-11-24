<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunde erfasst</title>
</head>
<body>
    <h1>Kunde erfolgreich erfasst</h1>
    <p>Folgende Daten wurden gespeichert:</p>
    <ul>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                foreach ($_POST as $key => $value) {
                    echo "<li><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value) . "</li>";
                }
            }
        ?>
    </ul>
    <a href="index.php">Zurück zur Kundenliste</a><br>
    <a href="kundenerfassung.html">Weiteren Kunden erfassen</a>
</body>
</html>
