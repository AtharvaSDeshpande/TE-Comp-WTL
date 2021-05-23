<?php include "db.php" ?>
<?php

function confirm($result)
{
    global $connection;
    if (!$result)
    {
        die ("QUERY FAILED" . mysqli_error($connection));
    }
}



 $employee_name = $_GET['name'];
 $employee_designation = $_GET['designation'];
 $employee_username = $_GET['username'];
 $employee_mobile = $_GET['mobile'];
 $employee_password = $_GET['password'];



 $query = "INSERT INTO details(email, password , name, mobile,designation)";
 $query .= "VALUES('{$employee_username}','{$employee_password}','{$employee_name }','{$employee_mobile}','{$employee_designation}')";
 $insert_post_query = mysqli_query($connection,$query);
 confirm($insert_post_query);
 header("Location: index.html");


?>
