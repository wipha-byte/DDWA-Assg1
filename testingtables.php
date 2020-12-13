<?php

session_start();

  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "irl";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
  else{ //continued within body tag

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
		<title>Student</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;

}
</style>      
        
	</head>
	<body>
    <table>
    <tr>
    <th>StudentID</th>
    <th>Name</th>
    <th>Year Enrolled</th>
    <th>Project Number</th>
    <th>Serial Number</th>
    <th>School</th>
    </tr>
    
<?php 
    $stud_id = $_SESSION["id"];
	$sql = "SELECT * FROM student WHERE student_id = $stud_id "; //Remember spacing! If not SQL string will be stuck tog.
	$result = $connection->query($sql);
	
	if ($result->num_rows > 0) {
     // output data of each row
    
     while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["student_id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["year_enrolled"]."</td>";
        echo "<td>".$row["project_number"]."</td>";
        echo "<td>".$row["serial_number"]."</td>";
        echo "<td>".$row["school"]."</td></tr>";
         
     }
} 	else {
     echo "No results!";
}

	}
	?>
    </table>
    </br>
    </br>
    <table>
    <tr>
    <th>Serial Number</th>
    <th>Make</th>
    <th>Model</th>
    <th>Processor</th>
    <th>Hard Disk Capacity</th>
    <th>Amount of RAM</th>
    <th>Operating System</th>
    <th>Student ID</th>
    </tr>
    <?php 
    $stud_id = $_SESSION["id"];
	$sql = "SELECT * FROM notebook WHERE student_id = $stud_id "; //Remember spacing! If not SQL string will be stuck tog.
	$result = $connection->query($sql);
	
	if ($result->num_rows > 0) {
     // output data of each row
    
     while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["serial_number"]."</td>";
        echo "<td>".$row["make"]."</td>";
        echo "<td>".$row["model"]."</td>";
        echo "<td>".$row["processor"]."</td>";
        echo "<td>".$row["hard_disk_capacity"]."</td>";
        echo "<td>".$row["amount_of_ram"]."</td>";
        echo "<td>".$row["operating_system"]."</td>";
        echo "<td>".$row["student_id"]."</td></tr>";
         
     }
} 	else {
     echo "No results!";
}

	
	?>
    </table> 
   
	</body>
</html>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>