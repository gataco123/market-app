<?php
    require('../config/database.php');
    $user_id =$_GET['userId'];

    $sql_get_user = "select * from users where id = $user_id";
    $result=pg_query($conn_supa,$sql_get_user);
    if(!$result){
        die("error: ". pg_last_error());
    }
    while($row = pg_fetch_assoc($result)){
        $ide_number =$row['ide_number'];
        $fname =$row['firstname'];
        $lname =$row['lastname'];
        
    
    }
?>


<?php
//conectarse a la base datos 
require('../config/database.php');
//step 2 get data or parmas
$user_id = $_GET['userId'];

$sql_get_users =  "select * from users where id = $user_id";
$result = pg_query($conn_supa, $sql_get_users);

if (!$result)
    {
        die("Error: ". pg_last_error());
    }
    while ($row = pg_fetch_assoc($result))
        {
            $ide_number = $row['ide_number'];    
            $fname= $row['firstname'];
            $lname = $row['lastname'];
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
    <center>
    <form name "edit-user-form" action ="update_user.php" method = "post">
     <input 
            type = "hidden" 
            name ="iduser" 
            value = "<?php echo $user_id?>"
            readonly
            required /> <br><br>
    <label >identification number:</laberl>
    <input 
            type = "text" 
            name ="idnumber" 
            value = "<?php echo $ide_number?>"
            readonly
            required /><br><br>    
    
    <label >Firstname:</laberl>
        
        <input 
            type = "text" 
            name ="fname" 
            value = "<?php echo $fname?>"
            required /> <br><br>

        <label >Lastename:</laberl>
            <input 
            type = "text" 
            name ="lastname" 
            value = "<?php echo $lname?>"
            required /><br><br>
            <button>Update user</button>
    </form>
    </center>
</body>
</html>