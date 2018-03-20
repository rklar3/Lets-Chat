<?php

  include 'connection.php';

  		$counter =0;
 		$posts=("SELECT * FROM topics");
        $posts1 = mysqli_query($connection,$posts) or die(mysql_error());
        while ($row = mysqli_fetch_assoc($posts1)) {
        $v = $row['postID'];
        $counter = $counter+1;
    }

    echo 'Total Number of posts: '.$counter;

  		$counter1 =0;
 		$posts=("SELECT * FROM users ORDER BY date desc ");
        $posts1 = mysqli_query($connection,$posts) or die(mysql_error());
        while ($row = mysqli_fetch_assoc($posts1)) {
        $v = $row['userID'];
        $w = $row['username'];
        $counter1 = $counter1+1;
    }

    echo '<br>Total Number of users: '.$counter1;
    echo '<br>Newest user: '.$w;











?>