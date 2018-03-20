<?php
      
      include 'connection.php';
      // only admin allowed
      if(! isset($_SESSION['admin'])){ header('Location: ../home.php');}

        if(@$_POST['search3']){
            @$delete = $_POST['search3'];
          
            @$change2=("DELETE FROM topics WHERE postID = '$delete' ");
            if (mysqli_query($connection, $change2)) {
               echo "post deleted";
            }else {
                echo "<script>alert('update failed');</script>";
        }}
      
      // enable user
      if(@$_POST['search2']){
            @$search2 = $_POST['search2'];
                   
            $change1=("UPDATE users SET disabled = '0' WHERE userID = '$search2' ");
           if (mysqli_query($connection, $change1)) {
              echo "<script>alert('user enabled');</script>";
           }else {
              echo "<script>alert('update failed');</script>";
           }
        include 'adminusers.php';
      }


      // disable user      
      if(@$_POST['search']){
            @$search = $_POST['search'];
                   
            $change=("UPDATE users SET disabled = '1' WHERE userID = '$search' ");
           if (mysqli_query($connection, $change)) {
              echo "<script>alert('user disabled');</script>";
           }else {
              echo "<script>alert('update failed');</script>";
           }
      include 'adminusers.php';
      }


       ?>