<?php include "db.php" ?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: center;
        }
    </style>
    <script>
        alert("Hello");
    </script>
</head>

<body>

    <?php


    $query = "SELECT * FROM details";
    $result = mysqli_query($connection, $query);

    echo "<table>
            <tr>
            <th>Name</th>
            <th>Desgination</th>
            <th>Email</th>
            <th>Mobile</th>
            </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['designation'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
  
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>