<?php
    //Step 1 get database access
    require('../config/database.php');

    //Step 2 get form-data
    $e_mail    =trim($_POST['email']);
    $p_wd      =trim($_POST['passwd']);    

    //$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    $enc_pass = md5($p_wd);

    $sql_check_user = "SELECT u.email, u.password FROM users u WHERE u.email = '$e_mail' AND u.password = '$enc_pass' LIMIT 1";

    $res_check = pg_query($conn, $sql_check_user);

    if(pg_num_rows($res_check) > 0){
        //echo "User exists, go to main page!";
        header('refresh:0;url=main.php');
    } else {
        echo "Verify data";
    }