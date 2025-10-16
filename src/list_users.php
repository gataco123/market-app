<?php
require('../config/database.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - List users</title>
</head>
<body>
    <table border = "2" align = "center">
        <tr>
            <th>Fullname</th>
            <th>E-mail</th>
            <th>Ide number</th>
            <th>phone number</th>
            <th>status</th>
            <th>options</th>
        </tr>
    </table>

    <table border="1" align = "center">
        <td>Joe Doe</td>
        <td>Joe@mail.com</td>
        <td>10856545</td>
        <td>3000233045</td>
        <td>Active</td>
        <td>
            <a haref ="#">
                <img src = "icons/search.png" width="20">
            </a>
        </td>
    </table>
</body>
</html>