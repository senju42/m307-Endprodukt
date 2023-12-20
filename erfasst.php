<?php
$id = $_GET['id'];
?>
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
echo $id; 
$sql = "SELECT *  FROM `kunden` WHERE `Kunden_ID` = $id;";
        ?>
    </ul>
    <a href="index.php">Zurück zur Kundenliste</a><br>
    <a href="kundenerfassung.php">Weiteren Kunden erfassen</a>
</body>
</html>
