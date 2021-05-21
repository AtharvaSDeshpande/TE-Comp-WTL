<div?
<?php include "./includes/header.php"?>

<?php
     if (isset($_POST['insert']))
     {
         $employee_name = $_POST['name'];
         $employee_designation = $_POST['designation'];
         $employee_username = $_POST['username'];
         $employee_mobile = $_POST['mobile'];
         $employee_password = $_POST['password'];


     
         $query = "INSERT INTO details(email, password , name, mobile,designation)";
         $query .= "VALUES('{$employee_username}','{$employee_password}','{$employee_name }','{$employee_mobile}','{$employee_designation}')";
         $insert_post_query = mysqli_query($connection,$query);
         confirm($insert_post_query);
         header("Location: index.php");
 
     }
    ?>
<div class="bg-dark text-white col-md-4 float-right pr-5 mr-0 position-sticky ">

    <!-- Blog Search Well -->
    <div class="well ">
        <br>
        <h4>Employee Search</h4>
        <BR>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="searchText" placeholder="Enter employee name" type="text" class="form-control">
                <span class="input-group-btn" id="search">
                <input class="btn btn-primary ml-1" type="submit" name="search" value="SEARCH">
                </span>
            </div>
        </form>
        <br>
        <!-- /.input-group -->
    </div>

    <hr class="bg-light">
    <br>
    <h4>Add new Employee</h4>
    <br>



    <div class="well">
        <form class="form-group" action="index.php" method="post">
            <label for="name">Enter Name</label>
            <input type="text" class="form-control" name="name" required>
            <label for="designation">Enter Designation</label>
            <input type="text" class="form-control" name="designation" required>
            <label for="mobile">Enter Mobile Number</label>
            <input type="tel" class="form-control" name="mobile" required>
            <label for="username">Enter Email</label>
            <input type="username" class="form-control" name="username" required>
            <label for="password">Enter Password</label>
            <input type="password" class="form-control" name="password" required>
            <hr class="bg-light">
            <div class="form-group">
                <div class = "d-flex justify-content-center" >
                    <input class="btn btn-primary " type="submit" name="insert" value="INSERT">
                </div>
            
        
        </form>
    </div>
        
        <hr class="bg-light">
        
    </div>
    <?php
        function confirm($result)
        {
            global $connection;
            if (!$result)
            {
                die ("QUERY FAILED" . mysqli_error($connection));
            }
        }
    ?>
   
</div>


<!-- /.row -->