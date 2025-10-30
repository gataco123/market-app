<?php
    require('../config/database.php');
    $user_id =$_GET['userId'];

    $sql_get_user = "select * from users where id = $user_id";
    $result=pg_query($conn_local,$sql_get_user);
    if(!$result){
        die("error: ". pg_last_error());
    }
    while($row = pg_fetch_assoc($result)){
        $ide_number =$row['ide_number'];
        $fname =$row['firstname'];
        $lname =$row['lastname'];
        
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name = "edit-user-form" action = "update_user.php" method = "post">
        <label>firstname</label><input 
            type ="text" 
            name ="fname" 
            value = "<?php echo $fname?>"
            equired/>

        <label>identification number</label><input 
            type ="hidden" 
            name ="fname" 
            value = "<?php echo $fname?>"
            readonly
            equired/>
</body>
</html>