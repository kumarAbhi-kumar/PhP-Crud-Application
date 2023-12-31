<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
    
    <div class="box1">
        <h2>ALL STUDENTS.</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
    </div>
    <table class="table table-hover table-border table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM `students`";
            $result = mysqli_query($connection, $query);
            if(!$result)
                die("Query Failed");
            else
                while($row = mysqli_fetch_assoc($result))
                {       
            ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['Age'];?></td>
                    <td><a href="update_page.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

                       
                </tr>
                
            <?php 
                }
            ?>
                
            </tbody>
    </table>

    <?php
        if(isset($_GET['message']))
        {
            echo "<h6>".$_GET['message']."</h6>";
        }
    ?>

<!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label>First Name
                    <br>
                    <input type="text" name="f_name" class="form-control">
                </label>
            </div>
            <div>
                <label>last Name
                    <br>
                    <input type="text" name="l_name" class="form-control">
                </label>
            </div>
            <div>
                <label>Age
                    <br>
                    <input type="number" name="age" class="form-control">
                </label>
            </div>
        
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value= "ADD"/>
      </div>
    </div>
  </div>
</div>
</form>
<?php include('footer.php'); ?>    