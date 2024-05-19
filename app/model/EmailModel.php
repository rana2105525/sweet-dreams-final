<?php

    

    if(isset($_POST["query"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "sweetdreams");
        $email = $_POST["query"];
        $query = "SELECT * FROM reg WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
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