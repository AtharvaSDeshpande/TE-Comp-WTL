<?php include "includes/db.php"; ?>

<?php include "includes/header.php";  ?>

<?php include "includes/navbar.php";  ?>
<!-- Page Content -->
<div>

    <div class="ml-5" id="">

        <!-- Blog Entries Column -->
        <div class="">
            <h1 class="page-header">
                Search Result </h1>
            <hr>
            <?php
            if (isset($_POST['search'])) {
                $search = $_POST['searchText'];
                $query = "SELECT * FROM details WHERE name LIKE '%$search%'";
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
                        <h3>
                            <?php echo $employee_name; ?>
                        </h3>
                        <p>
                        <?php echo $employee_designation; ?><br />
                        <?php echo $employee_mobile; ?><br>
                        <?php echo $employee_email; ?>
                        </p>
                        <!-- <hr> -->
                        <!-- <hr> -->
                        <?php

if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM details WHERE email = '{$the_post_id}'";
    $delete_query = mysqli_query($connection, $query);
    header("Location: index.php");
}



?>
                        <div class="d-flex">
                        <a class="btn btn-primary mr-1" href=<?php echo 'update.php?update=' . $employee_username; ?>>Update<span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary ml-1" href=<?php echo 'index.php?delete=' . $employee_username;  ?>>Delete<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>

                        <hr>

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