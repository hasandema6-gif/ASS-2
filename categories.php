<?php

include 'config.php';

if(isset($_POST['add']))
{
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories(category_name)

    VALUES('$category_name')";

    mysqli_query($conn,$sql);

    echo "Category Added";
}

$sql = "SELECT * FROM categories";

$result = mysqli_query($conn,$sql);

?>

<h2>Add Category</h2>

<form method="POST">

<input type="text"
name="category_name"
placeholder="Category Name">

<br><br>

<button type="submit" name="add">
Add Category
</button>

</form>

<hr>

<h2>All Categories</h2>

<table border="1">

<tr>

<th>ID</th>
<th>Name</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['category_name']; ?></td>

</tr>

<?php
}
?>

</table>