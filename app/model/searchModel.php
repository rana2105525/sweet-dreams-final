<?php

    if(isset($_POST["query"]))
    {
        $conn = mysqli_connect("172.232.217.28", "root", "SweetDreams123", "sweetdreams_final");
        $output = '';
        $query = "SELECT * FROM products WHERE title LIKE '%".mysqli_real_escape_string($connect, $_POST["query"])."%'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $output .= '
                <div style="padding: 20px; border: 1px solid #ccc; margin-bottom: 15px; width: 100%;">
                    <h3><a href="searchedProd.php?id='.$row["id"].'">'.$row["title"].'</a></h3>
                    <p>'.$row["category"].'</p>
                    <p>'.$row["price"].'</p>

                </div>
                ';
            }
        }
        else
        {
            $output .= '<h3>No Results</h3>';
        }
        echo $output;
    }
    ?>





