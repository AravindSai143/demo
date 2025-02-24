<?php
session_start();
include "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        if (hash("sha256", $password) === $admin["password"]) {
            $_SESSION["admin"] = $admin["username"];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "❌ Invalid Password!";
        }
    } else {
        echo "❌ Admin Not Found!";
    }
}

$conn->close();
?>
