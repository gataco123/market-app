<?php
    //Step 1 get database access
    require('../config/database.php');

    //Step 2 get form-data
    $e_mail    = $_POST['email'];
    $p_wd      = $_POST['passwd'];    

   $sql_check_user = "SELECT u.email, u.password FROM users u WHERE u.email = '$e_mail' AND u.password = '$p_wd' LIMIT 1";

    // Ejecutar la consulta
    $res = pg_query($conn, $sql_check_user);

    if(pg_num_rows($res) > 0){
        echo "User exists, go to main page!";
    } else {
        echo "Verify data";
    }