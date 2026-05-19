<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: auth.php");
}

?>

<h1>Dashboard</h1>

<hr>

<a href="news.php">
News Page
</a>

<br><br>

<a href="categories.php">
Categories Page
</a>

<br><br>

<a href="auth.php">
Logout
</a>