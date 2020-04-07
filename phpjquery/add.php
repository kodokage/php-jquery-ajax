<?php
    include_once 'db_con.php';

     //Add Products
     if(isset($_POST['title'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $details= mysqli_real_escape_string($conn, $_POST['details']);
    
    //Inserting Products into database
    $sql = "INSERT INTO products (title, details) VALUES ('$title', '$details')";
    $result = mysqli_query($conn, $sql);
    //Assign product id as image name
        $pid = mysqli_insert_id($conn);
        $imagename = "$pid.jpg";
        move_uploaded_file($_FILES['pro_image']['tmp_name'], "images/$imagename");
        header('location:add.php');
        exit();
    }
?>


<!-- <form action="add.php" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label class="control-label col-sm-2" for="title">Title</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="title" placeholder="Enter Title">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="details">Details</label>
  <div class="col-sm-10">
    <textarea name="details" cols="155" rows="5"></textarea>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10">
  <input type="file" name="pro_image" id="pro_image">
  </div>
</div>


<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-info">Submit</button>
  </div>
</div>

</form> -->
