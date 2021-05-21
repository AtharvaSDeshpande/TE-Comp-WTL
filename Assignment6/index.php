<?php include "includes/db.php"; ?>

<?php include "includes/header.php";  ?>

<?php include "includes/navbar.php";  ?>
<!-- Page Content -->
<div class="">

<?php include "includes/sidebar.php"; ?>

    <div class="ml-5" id="blog">
        <?php

        if (isset($_GET['delete'])) {
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM details WHERE email = '{$the_post_id}'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: index.php");
        }



        ?>

        <!-- Employee Details Column -->
        <div class="">
            <h1 class="page-header">
                Employee Details </h1>
            <hr class = "bg-primary">
            <?php
            $query = "SELECT * FROM details";
            $search_query = mysqli_query($connection, $query);

            if (!$search_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            $count = mysqli_num_rows($search_query);
            if ($count == 0)    echo "<h1>Database is empty</h1>";
            else {
                $select_all_search_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_search_query)) {
                    $employee_name = $row['name'];
                    $employee_designation = $row['designation'];
                    $employee_username = $row['email'];
                    $employee_mobile = $row['mobile'];

            ?>



                    <!-- First Blog Post -->
                    <!-- First Blog Post -->
                    <h3>
                        <?php echo $employee_name; ?>
                    </h3>
                    <p>
                        <?php echo $employee_designation; ?><br />
                        <?php echo $employee_mobile; ?><br>
                        <?php echo $employee_username; ?>
                    </p>
                    <!-- <hr> -->
                    <!-- <hr> -->
                    <div class="d-flex">
                        <a class="btn btn-primary mr-1" href=<?php echo 'update.php?update=' . $employee_username; ?>>Update<span class="glyphicon glyphicon-chevron-right"></span></a>
                        <a class="btn btn-primary ml-1" href=<?php echo 'index.php?delete=' . $employee_username;  ?>>Delete<span class="glyphicon glyphicon-chevron-right"></span></a>

                    </div>

                    <hr>

            <?php
                }
            }

            echo "<br>";
            echo "<br>";
            // echo "<r>";
            echo "<br>";

            ?>


        </div>
        
    </div>
 <!-- Blog Sidebar Widgets Column -->

    
</div>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>