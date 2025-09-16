<?php
    //Step 1 get database access
    require('../config/database.php');
    //Step 2 get form-data

    $f_name    = $_POST['fname']; //los campos dentro de los corchetes 
    $l_name    = $_POST['lname']; //deber ser igual al de el $
    $m_number  = $_POST['mnumber'];
    $id_number = $_POST['idnumber'];
    $e_mail    = $_POST['email'];
    $p_wd      = $_POST['passwd'];

    $enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);

    $check_email = "
        select
            u.email
        from
            users u
        where
            email = '$e_mail' or ide_number = '$id_number'
        limit 1
    "
    $res_check = pg_query($conn,$check_email) ;
    if(pg_num_rows($res_check)>0){
        echo "<script>alert('users already exists !!')</scripts>";+
        header('refresh:0;url=signin.html');
    }else {
         //Step 3 create query to insert into
    $query = "
        INSERT INTO users (
            firstname,
            lastname,
            mobile_number,
            ide_number,
            email,
            password
        )
        Values(
            '$f_name',
            '$l_name',
            '$m_number',
            '$id_number',
            '$e_mail',
            '$enc_pass'
        )"
    ;

    //Step 4  execute query
    $res = pg_query($conn,$query);
            //step 5. validate result
    if($res){
       // echo "user has been created succesfully !!!";
       echo "<script>alert('Success !!! Go to login'</scripts>";+
       header('refresh:0;url=signin.html');
    }else{
        echo "something wrong!";
    }

    }

   

    

?>