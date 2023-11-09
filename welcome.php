<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: 5.php");
    exit();
}

// Display welcome message
echo "Welcome, " . $_SESSION['username'] . "! Login successful.";
?>