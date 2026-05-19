<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "news_system"
);

if(!$conn)
{
    die("Connection Failed");
}

?>