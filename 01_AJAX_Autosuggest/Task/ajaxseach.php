    <?php

        include "db.php";
        $mode = $_GET['mode'] ?? '';

        $sql = mysqli_query($conn, "select*from internship where mode = '$mode' ");

        if(mysqli_num_rows($sql)>0)
            {
                echo "<table border='1' cellpadding='10'>";
                    echo"<tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Mode</th>
                    </tr>";
                

                while($row = mysqli_fetch_assoc($sql))
                    {
                        echo "<tr>
                            <td>".$row['stud_name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['contact']."</td>
                            <td>".$row['mode']."</td>
                        
                        </tr>";
                    }

                echo"</table>";    
            }

            else{
                echo "No record found";
            }
    
    ?>