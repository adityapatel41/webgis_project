<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "webgis_auth";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_input = $_POST["username"];
$pass_input = $_POST["password"];

$sql = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_input);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($pass_input, $hashed_password)) {
        $_SESSION["authenticated"] = true;
        $_SESSION["username"] = $user_input;
        header("Location: map.php");
        exit();
    } else {
        $_SESSION["login_error"] = "Invalid password.";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION["login_error"] = "Username not found.";
    header("Location: login.php");
    exit();
}
?>
