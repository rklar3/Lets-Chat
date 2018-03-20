<?php

  session_start();


include 'connection.php';

    
if(@$_POST['deleteaccount']){

          
@$username = $_SESSION["username"];
@$password = md5($_POST['deleteaccount']);

    #search for account in database
    $count = 0;      
    $result=("SELECT * FROM users Where username = '$username' and password = '$password' ");
    $result1 = mysqli_query($connection,$result) or die(mysql_error());

    while ($row = mysqli_fetch_assoc($result1)) {
        $a = $row['username'];
        $b = $row['password'];
        $count = $count +1;
    }

    if($count == 1){
        # echo 'username  '.$a;
        # echo "<br>";
        # echo 'password  '.$b;
    }else{
        echo "wrong password";
    }

    #delete account
    @$delete = "DELETE FROM users WHERE username = '$username' ";

    if(mysqli_query($connection, $delete)){
       session_destroy();
       echo "account has been deleted";
    }else{
       echo "Sorry, Account was not deleted";
    }

}


?>