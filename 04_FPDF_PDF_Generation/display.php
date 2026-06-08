<?php
// Database connection
$host = "localhost"; 
$user = "root";      
$pass = "";         
$dbname = "pdfdemo"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM receipt order by amt desc"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Payment Records</title>
    <style>
		
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Student Payment Data</h2>

<p style="text-align:center;">
    <a href="df.php" target="_blank">
        Generate PDF
    </a>
</p>

<table>
    <tr>
        <th>Receipt No</th>
        <th>Receipt Date</th>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Amount</th>
        
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['rno']}</td>
                    <td>{$row['rdate']}</td>
                    <td>{$row['stud_id']}</td>
                    <td>{$row['stud_nm']}</td>
                    <td>{$row['ccode']}</td>
                    <td>{$row['cname']}</td>
                    <td>{$row['amt']}</td>
                    
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No data found</td></tr>";
    }

    
    ?>



</table>

</body>
</html>

<?php
$conn->close();
?>
