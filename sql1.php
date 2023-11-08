<?php

$server = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully!";
} else {
    echo "Error creating database: " . $conn->error;
}


$dbname = "mydatabase";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS your_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


$host = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>CRUD Application</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="insert">Insert</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
    
        if (isset($_POST['insert'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sql = "INSERT INTO your_table (name, email) VALUES ('$name', '$email')";
            
            if (mysqli_query($conn, $sql)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        $sql = "SELECT * FROM your_table";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>';
                echo '<a href="' . $_SERVER['PHP_SELF'] . '?edit=' . $row['id'] . '">Edit</a>';
                echo '<a href="' . $_SERVER['PHP_SELF'] . '?delete=' . $row['id'] . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'No records found.';
        }

    
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $sql = "SELECT * FROM your_table WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $email = $row['email'];
                echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '?update=' . $id . '">';
                echo '<input type="hidden" name="id" value="' . $id . '">';
                echo '<input type="text" name="name" value="' . $name . '" placeholder="Name">';
                echo '<input type="email" name="email" value="' . $email . '" placeholder="Email">';
                echo '<button type="submit" name="update">Update</button>';
                echo '</form>';
            }
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sql = "UPDATE your_table SET name = '$name', email = '$email' WHERE id = $id";
            
            if (mysqli_query($conn, $sql)) {
                echo "Data updated successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

    
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $sql = "DELETE FROM your_table WHERE id = $id";
            
            if (mysqli_query($conn, $sql)) {
                echo "Record deleted successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
