<?php

session_start();

include 'config.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password)

    VALUES('$name','$email','$password')";

    mysqli_query($conn,$sql);

    echo "Account Created";
}

if(isset($_POST['login']))
{
    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "SELECT * FROM users

    WHERE email='$email'
    AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id']=$user['id'];

        echo "Login Success";
    }
    else
    {
        echo "Wrong Data";
    }
}

?>

<h2>Register</h2>

<form method="POST">

<input type="text"
name="name"
placeholder="Name">

<br><br>

<input type="email"
name="email"
placeholder="Email">

<br><br>

<input type="password"
name="password"
placeholder="Password">

<br><br>

<button type="submit" name="register">
Register
</button>

</form>

<hr>

<h2>Login</h2>

<form method="POST">

<input type="email"
name="email"
placeholder="Email">

<br><br>

<input type="password"
name="password"
placeholder="Password">

<br><br>

<button type="submit" name="login">
Login
</button>

</form>