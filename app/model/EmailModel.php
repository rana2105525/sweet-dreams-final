<?php

    

    if(isset($_POST["query"]))
    {
      $connect = mysqli_connect("172.232.217.28", "root", "SweetDreams123", "sweetdreams");
        $email = $_POST["query"];
        $query = "SELECT * FROM reg WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            echo "Email exists in the database";
        }
        else
        {
            echo "Email does not exist in the database";
        }
    }
    ?>