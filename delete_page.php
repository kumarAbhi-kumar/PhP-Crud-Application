<?php include('dbcon.php'); ?>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];

$query = "DELETE FROM `students` where `id` = $id";
$result = mysqli_query($connection, $query);
if(!$result)
{
    echo "QF".mysqli_error();
}
else
    header('location:index.php?message=Deleted!');
}
?>