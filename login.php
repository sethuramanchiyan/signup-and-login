<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('db.php');
    session_start();
    if(isset($_POST['username']))
    {
        $username=stripcslashes($_REQUEST['username']);
        $username=mysqli_real_escape_string($con,$username);
        $password=stripcslashes($_REQUEST['password']);
        $password=mysqli_real_escape_string($con,$password);
        $query="SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        $rows=mysqli_num_rows($result);
        if($rows==1)
        {
            $_SESSION['username']=$username;
            header("Location:index.php");
        }
        else
        {
            echo "<div class='form'><h3>Username/password is incorrect.</h3><br />Click here to <a href='login.php>Login</a></div>";

        }
    }
        else
        {
    ?>
    <div class="form">
        <h1>Log in</h1>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" type="submit" value="Login" />
        </form>
        <p>Not registered yet? <a href="registration.php">Register Here</a></p>
        </div>
        <?php
        }
        ?>
</body>
</html>