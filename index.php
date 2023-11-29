<!DOCTYPE html>
<html lang="de">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenliste</title>
    <style>
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
        }
    </style>
</head>
<body>
<h1>Erfasste Kunden</h1>

<?php
        $kunden = array(
            array("Mannhart", "Manfred", "Fidlistrasse 48", "ST.Gallen", "9000", "ST.Gallen", "manfred.mannhart@gmail.com", "079 133 80 90", "Einzelperson", "Aktiv"),
        );
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Vorname</th>
            <th>Strasse & Hausnummer</th>
            <th>Ortsname</th>
            <th>PLZ</th>
            <th>Kanton</th>
            <th>E-Mail</th>
            <th>Telefon</th>
            <th>Kundenklasse</th>
            <th>Status</th>
        </tr>
        <?php
            foreach ($kunden as $kunde) {
                echo "<tr>";
                foreach ($kunde as $info) {
                    echo "<td>$info</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
<a href="kundenerfassung.html">Kunde erfassen</a>
</html>