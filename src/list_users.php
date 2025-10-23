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
        <?php 
            $sql_users = 
            "select 
	            u.firstname ||' '|| u.lastname as fullname,
	            u.email,
	            u.ide_number,
	            u.mobile_number,
	            case when u.status = true then 'Active' else 'Inactive'
	            end as status
            from users u";

            $result =pg_query($conn_local, $sql_users);
            if(!$result){
                die("error". pg_last_error());
            }

            while ($row = pg_fetch_assoc($result)){
                echo "<tr>
                        <td> ".$row['fullname']."</td>
                        <td>".$row['email']."</td>
                        <td>Joe@mail.com</td>
                        <td>10856545</td>
                        <td>3000233045</td>
                        <td>Active</td>
                        <td>
                        <a haref ='#'>
                            <img src = 'icons/search.png' width='20'>
                        </a>
                        </td>
                        </tr>";

            }
        ?>


        </table>
        
</body>
</html>