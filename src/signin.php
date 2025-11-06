<?php
    //Step 1 get database access
    require('../config/database.php');

    //Start or create session
    session_start();

    if(isset($_SESSION['session_user_id'])){
        header('refresh:0;url=main.php');
    }else{
        header('refresh:0;url=error_403.html');
    }
    //Step 2 get form-data
    $e_mail    =trim($_POST['email']);
    $p_wd      =trim($_POST['passwd']);    

    //$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    $enc_pass = md5($p_wd);

    $sql_check_user = 
        "SELECT 
            u.id, 
            u.firstname ||' '|| u.lastname as fullname,
            u.email, 
            u.password 
        FROM users u 
        WHERE u.email = '$e_mail' 
        AND u.password = '$enc_pass' 
        LIMIT 1";

    $res_check = pg_query($conn_supa, $sql_check_user);

    $row = pg_fetch_assoc($res_check);
    $_SESSION['session_user_id'] = $row['id'];
    $_SESSION['session_user_fullname'] = $row['fullname'];

    if(pg_num_rows($res_check) > 0){
        echo "User exists, go to main page!";
        header('refresh:0;url=main.php');
    } else {
        echo "Verify data";
    }