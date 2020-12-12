<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <style>
    .invalid{
        color: red;
    }
body {
    text-align: center;
    background-color: #21A256;
}
form {
    display: inline-block;
    background-color: white;
    margin:50px;
    padding: 50px;
    border-radius: 20px;
}
label{
    font-weight: bold;
    color: grey;
}

    input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 20px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


    </style>
    </head>
   
  <body>
  <?php
  
  if(isset($_GET["submitBtn"])){
      if($_GET["username"] == "student" && $_GET["password"] == "password" && $_GET["account"]=="1"){
        header("Location: student.php");
        }else if ($_GET["username"] == "lecturer" && $_GET["password"] == "password" && $_GET["account"]=="2"){
            header("Location: admin.php");
        }
        else if($_ GET["username"] == "admin" && $_GET["password"] == "password" && $_GET["account"]=="3"){
            header("Location: lecturer.php");
        }
        else if($_ GET["username"] == "" && $_GET["password"] == ""){
            echo "<div class=\"invalid\">Please enter your username and Password </div>";
        } else {
                echo "<div class=\"invalid\">Invalid login request </div>";
            };
        };

  ?>

  </br>
  </br>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "get">

  <label for="account">User:</label>
  <select class="browser-default custom-select" name="account" id="account">
  <option selected>Which account to log into</option>
  <option value="1">student</option>
  <option value="2">staff</option>
  <option value="3">admin</option>
</select>><br /><br />

  <label for="username">Username:</label>
  <input type="text" name="username" id="username" /><br /><br />

  <label for="password">Password:</label>
  <input type="password" name="password" id="password"/><br /><br />

  <input type="submit" name="submitBtn" value="Login">


  
  </form>


    
  </body>
</html>