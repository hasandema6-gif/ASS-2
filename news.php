<?php

session_start();

include 'config.php';

$categories = mysqli_query($conn,
"SELECT * FROM categories");

if(isset($_POST['add_news']))
{
    $title = $_POST['title'];

    $details = $_POST['details'];

    $category_id = $_POST['category_id'];

    $user_id = 1;

    $sql = "INSERT INTO news
    (title,details,category_id,user_id,status)

    VALUES

    ('$title','$details',
    '$category_id','$user_id','active')";

    mysqli_query($conn,$sql);

    echo "News Added";
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $sql = "UPDATE news

    SET status='deleted'

    WHERE id='$id'";

    mysqli_query($conn,$sql);
}

$sql = "SELECT news.*,
categories.category_name

FROM news

INNER JOIN categories

ON news.category_id=categories.id

WHERE status='active'";

$result = mysqli_query($conn,$sql);

?>

<h2>Add News</h2>

<form method="POST">

<input type="text"
name="title"
placeholder="News Title">

<br><br>

<textarea name="details"></textarea>

<br><br>

<select name="category_id">

<?php
while($cat=mysqli_fetch_assoc($categories))
{
?>

<option value="<?php echo $cat['id']; ?>">

<?php echo $cat['category_name']; ?>

</option>

<?php
}
?>

</select>

<br><br>

<button type="submit" name="add_news">
Add News
</button>

</form>

<hr>

<h2>All News</h2>

<table border="1">

<tr>

<th>Title</th>
<th>Details</th>
<th>Category</th>
<th>Delete</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['details']; ?></td>

<td><?php echo $row['category_name']; ?></td>

<td>

<a href="news.php?delete=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>