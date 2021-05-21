<?php include "includes/db.php"; ?>

<?php include "includes/header.php";  ?>

<?php include "includes/navbar.php";  ?>
<!-- Page Content -->

<?php
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    return true;
}
?>

<div>

    <div class="ml-5" id="">

        <!-- Blog Entries Column -->
        <div class="">
            <h1 class="page-header">
                Update Employee Details </h1>
            <hr>
            <?php
            if (isset($_GET['update'])) {
                $search = $_GET['update'];
                $query = "SELECT * FROM details WHERE email = '$search'";
                $search_query = mysqli_query($connection, $query);

                if (!$search_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                $count = mysqli_num_rows($search_query);
                if ($count == 0)    echo "<h1>No Result</h1>";
                else {
                    $select_all_search_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_search_query)) {
                        $employee_name = $row['name'];
                        $employee_designation = $row['designation'];
                        $employee_username = $row['email'];
                        $employee_mobile = $row['mobile'];



            ?>



                        <!-- First Blog Post -->
                        <form class="form-group" action="#" method="post">

                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" value="<?php echo $employee_name; ?>" /><br />
                            <hr>
                            <label for="designation">Designation:</label><br>
                            <input type="text" name="designation" value="<?php echo $employee_designation; ?>" required /><br />

                            <hr>
                            <label for="mobile">Mobile:</label> <br>
                            <input type="text" name="mobile" value="<?php echo $employee_mobile; ?>" required /><br />

                            <hr>
                            <label for="email">Email:</label> <br>
                            <input type="text" name="email" value="<?php echo $employee_username; ?>" required /><br />

                            <!-- <hr> -->
                            <hr>
                            <?php
                            if (isset($_POST['update'])) {
                                $employee_name = $_POST['name'];

                                $employee_designation = $_POST['designation'];
                                $employee_username = $_POST['email'];
                                $employee_mobile = $_POST['mobile'];
                                $employee_password = $_POST['password'];



                                $query = "UPDATE  details ";
                                $query .= "SET email = '{$employee_username}',password = '{$employee_password}',name = '{$employee_name}',mobile = '{$employee_mobile}',designation = '{$employee_designation}' where email = '{$search}'";
                                $update_post_query = mysqli_query($connection, $query);
                                if (confirm($update_post_query)) {
                                    echo "Successfully updated";
                                }
                                 header("Location: update.php?update=$employee_username");

                            }
                            ?>
                            <div class="d-flex">

                                <button type="submit" class="btn btn-primary mr-1" name="update">Update<span class="glyphicon glyphicon-chevron-right"></span></button>


                            </div>
                            <hr>

                        </form>



            <?php
                    }
                }
            }
            echo "<br>";
            echo "<br>";

            ?>

        </div>


        <!-- Blog Sidebar Widgets Column -->
        <!--  -->



        <!-- Footer -->
        <?php include "includes/footer.php"; ?>