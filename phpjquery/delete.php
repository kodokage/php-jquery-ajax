<?php
    include_once 'db_con.php';
?>
<?php
    // //Deleting Inventory
    // if(isset($_GET['deleteID'])){
    //     echo "<h5>Do you really want to delete this item: ".$_GET['deleteID'] ."?
    //         <a class='btn btn-danger' href='delete.php?confirmDelete=".$_GET['deleteID']."'>Yes</a> ||
    //          <a class='btn btn-primary' href='index.php'>No</a> 
    //     </h5>";
    // }
    if(isset($_GET['deleteID'])){
        $idToDelete = $_GET['deleteID'];
        $del = "DELETE FROM products WHERE id = '$idToDelete' ";
        $delresult = mysqli_query($conn, $del);

        //Deleting Images
        $imageDel = ("images/".$idToDelete.".jpg");
        if(file_exists($imageDel)){
            unlink($imageDel);
        }
         header('location:index.html');
         exit();
    }
?>