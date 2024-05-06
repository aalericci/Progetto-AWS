<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 40px;
            margin: 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        a.submit {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.submit:hover {
            background-color: #45a049;
        }

        .error {
            font-size: 14px;
            color: #d9534f;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>Login</p>
        <input type="text" name="username" maxlength="50" placeholder="Username" required />
        <input type="password" name="password" maxlength="50" placeholder="Password" required />
        <span class="error">
        <?php
            include 'connect.php';
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $control = "SELECT * FROM utente WHERE username = '$username'";

                if ($conn->query($control)->num_rows == 0) {
                    echo 'Username non presente.';
                } else {
                    $sql = "SELECT * FROM utente WHERE username = '$username' AND password = '$password'";
                    if ($conn->query($sql)->num_rows > 0) { 
                        $_SESSION['username'] = $username;
                        //echo "Benvenuto $username";
                        header("Location: relazione.php");
                    } else {
                        echo 'Username o Password non corretti.';
                    }
                }
                $conn->close();
            }
            ?>
        </span>
        <input type="submit" value="Accedi" />
    </form>
</body>
</html>
