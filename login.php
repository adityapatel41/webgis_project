<?php
session_start();
$error = isset($_SESSION["login_error"]) ? $_SESSION["login_error"] : "";
unset($_SESSION["login_error"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        .register-button {
            background-color: #007bff;
            margin-top: 5px;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to WebGIS</h2>
        <form method="POST" action="verify.php" onsubmit="return validateForm()">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- Register Redirect Button -->
        <form action="register.php">
            <button type="submit" class="register-button">New User? Sign Up</button>
        </form>

        <!-- Error display -->
        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
    </div>

    <script>
        function validateForm() {
            const user = document.getElementById("username").value.trim();
            const pass = document.getElementById("password").value.trim();
            if (!user || !pass) {
                alert("Please fill in both username and password.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
