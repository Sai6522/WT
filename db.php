<?php

$connection = mysqli_connect("localhost", "root", "", "lab");


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student WHERE department = 'CSE'";
$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Students in CSE Department</title>
</head>
<body>
    <h2>Students in CSE Department</h2>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Age</th>
        </tr>
        <?php

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["department"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No students found in the CSE department.</td></tr>";
        }
        ?>
    </table>

    <?php

    mysqli_close($connection);
    ?>
</body>
</html>
