<?php
    include_once 'db_con.php';
?>
<?php
        //Fetching Product 
        if(isset($_GET['editID'])){
            $targetID = $_GET['editID'];
            $sql = "SELECT * FROM products WHERE id ='$targetID' ";
            $result = mysqli_query($conn, $sql);
            $product_count = mysqli_num_rows($result);
            if($product_count > 0){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $details = $row['details'];
                }
                }else{
                    echo "Product does not exist";
                    exit();
                }
            }
?>

<?php
    //Updating the fields
            if(isset($_POST['title'])){
                $pid = mysqli_real_escape_string($conn, $_POST['thisID']);
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $details = mysqli_real_escape_string($conn, $_POST['details']);

                $sql = "UPDATE products SET title = '$title', details = '$details' WHERE id = '$pid' ";
                $result = mysqli_query($conn, $sql);
                $product_match = mysqli_num_rows($result);

                if($_FILES['pro_image']['tmp_name'] != ""){
                    $newImageName = "$pid.jpg";
                    move_uploaded_file($_FILES['pro_image']['tmp_name'], "images/$newImageName");
                }
                header('location:index.html');
                exit();
            }
?>

<link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css\bootstrap.css">
    <script src="js\jquery-3.2.1.min.js"></script>
<div>
     
     <h1  class="alert alert-warning" >Edit Inventory</h1>


     <form action="edit.php" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label class="control-label col-sm-2" for="title">Product Title</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="title" placeholder="Enter Title" value = "<?php echo $title ?>">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="details">Product details</label>
  <div class="col-sm-10">
    <input name="details"  value="<?php echo $details ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10">
  <input type="file" name="pro_image" id="pro_image">
  </div>
</div>

<input type="hidden" name="thisID" value="<?php echo $targetID ?>">

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-info">Submit</button>
  </div>
</div>

</form>

 </div>