<?php include('header.php');?>
<?php include('dbcon.php');?>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE `id` = '$id' ";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed!".mysqli_connect_error());
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<form action="update_page.php?$id_new=<?php echo $id;?>" method="post">
            <div class="form-group">
                <label for="f_name">First Name:</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['firstName']; ?>">    
            </div>

            <div class="form-group">
                <label>last Name
                    <br>
                    <input type="text" name="l_name" class="form-control" value="<?php echo $row['lastName']; ?>">
                </label>
            </div>
            <div class="form-group">
                <label>Age
                    <br>
                    <input type="number" name="age" class="form-control" value="<?php echo $row['Age']; ?>">
                    <br>
                </label>
            </div>
            <input type="submit" name="update_students" class="btn btn-success" value="UPDATE">
</form>

<?php
    if(isset($_POST['update_students'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $agee = $_POST['age'];

        $query = "UPDATE `students` set `firstName` = '$fname', `lastName` = '$lname', `Age` = '$agee' WHERE `id` = '$idnew'";
        $result = mysqli_query($connection, $query);
        if(!$result)
            die("QF".mysqli_connect_error());
        else
            header('location:index.php?message=Updated Successfully');
    }
?>

<?php include('footer.php'); ?>   