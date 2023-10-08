<?php include('dbcon.php'); ?>
<?php
    if(isset($_POST['add_students']))
        
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $age = $_POST['age'];

        if($f_name == "" || empty($f_name))
        {
            header('location:index.php?message=You need to fill in the first name!');
        }
        else{
            $query = "INSERT INTO students(firstName, lastName, Age) VALUES (?,?,?)";
            $result = $connection->prepare($query);
            $result->bind_param("sss", $f_name, $l_name, $age);
            $result->execute();

            if(!$result){
                die('Query Failed'.mysqli_connect_error());
            }
            else{
                header('location:index.php?message=Inserted Successfully!');
            }
        }
        
?>