<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="account-page">
        <div class="container">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">login</span>
                    <span onclick="register()">register</span>
                    <hr id="indicator">
                </div>
                <form action="" id="LoginForm" method="post">
                    <input type="text" placeholder="username" name="username">
                    <input type="password" placeholder="password" name="password">
                    <button type="submit" class="btn" name="submit2">login</button>
                    <a href="reset.php">forget password</a>
                </form>
                <form action="" id="RegForm" method="post">
                    <input type="text" placeholder="username" name="username">
                    <input type="passsword" placeholder="password" name="password">
                    <input type="email" placeholder="email" name="email">
                    <button type="submit" class="btn" name="submit">register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var indicator = document.getElementById("indicator");

        function register() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(100px)";
        }

        function login() {
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            indicator.style.transform = "translateX(0px)";
        }
    </script>
    <?php
    require ('conn.php');
    if (isset($_POST['submit'])) {
        $username = ($_POST['username']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        if (!empty($username) && !empty($email) && !empty($password)) {
            $insert = "INSERT INTO user(username, password,email) VALUES ('$username','$password','$email')";
            mysqli_query($conn, $insert);
            // echo "sucesfully registered";
            // echo "<h3><a href='login.php'>login</a><h3>";
        } else {
            echo "all fields required";
        }
    }

    session_start();
    if (isset($_POST['submit2'])) {
        $username = ($_POST['username']);
        $password = ($_POST['password']);
        if (!empty($username) && !empty($password)) {
            $sql = "SELECT * FROM user WHERE username='$username'AND password='$password'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $number = mysqli_num_rows($result);
            if ($number == 0) { 
                echo "please register first ";
            } else{
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['userid'];
                $_SESSION['username'] = $row['username'];
                header("location:index.php");
                // exit();
            }
        } else {
            echo "all fields required";
        }
    }
    ?>

</body>

</html>