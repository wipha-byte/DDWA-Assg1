<?php
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
		<title>The X-Men Collection!</title>
	</head>
	<body>
<?php 
	$sql = "SELECT * FROM student "; //Remember spacing! If not SQL string will be stuck tog.
	$result = $connection->query($sql);
	
	if ($result->num_rows > 0) {
     // output data of each row
    
     while($row = mysqli_fetch_assoc($result)) {
         echo $row["student_id"]."<br/>";
         echo $row["name"]."<br/>";
         echo $row["school"]."<br/>";
         
     }
} 	else {
     echo "No results!";
}

	}
	?>
	</body>
</html>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>