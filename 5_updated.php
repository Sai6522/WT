<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        
        <button type="submit" name="submit">Login</button>
    </form>

    <?php
    // Start a session
    session_start();

    // Sample username and password (replace this with your actual credentials)
    $validUsername = "ram";
    $validPassword = "1234";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the submitted username and password
        if (empty($username) || empty($password)) {
            echo "<p style='color:red;'>Required your data.</p>";
        } else {
            if ($username == $validUsername && $password == $validPassword) {
                // Set session variables and redirect to a welcome page
                $_SESSION['username'] = $username;
                header("Location: welcom.php");
            } else {
                echo "<p style='color:red;'>Incorrect username or password.</p>";
            }
        }
    }
    ?>
</body>
</html>