<?php
require_once 'connect.php';
require_once 'header.php';
require_once 'security.php';

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: index.php");
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];


if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);

 $filename =$_FILES["uploadfile"]["name"];
 $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder = "./image/" . $filename;

 $sql2 = "UPDATE posts SET title = '$title', description = '$description',image='$filename' WHERE id = $id";

 

 if (mysqli_query($dbcon, $sql2)) {

     if(move_uploaded_file($tempname, $folder)){
         echo"";
     }
     else{
         echo"";
     }
         
        

        printf("<h2 style='text-align:center;'> Edited successfully. </h2><meta http-equiv='refresh' content='2; url=%s'/>",
       "view.php?id=".$id."");
    } else {
        echo "failed to edit." . mysqli_connect_error();
    }
}
?>

    <div class="w3-container">
    <div class="w3-card-4">

        <div class="w3-container w3-teal">
            <h2>Edit Post  </h2>
        </div>
            <h4 class="w3-container"><a href="<?=$permalink?>">Goto post</a> </h4>

        <form action="" method="POST" class="w3-container" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>
                <label>Title</label>
                <input type="text" class="w3-input w3-border" name="title" value="<?php echo $title; ?>">
            <p>
            <p>
                <label>Description</label>
                <textarea class="w3-input w3-border" id="description" name="description"><?php echo $description; ?> </textarea>
            </p>
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
                <input type="submit" class="w3-btn w3-teal w3-round" name="upd" value="Save post">
            </p>

            <p>
            <div class="w3-text-red">
                <a href="<?=$url_path?>del.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this post?'); ">Delete Post</a></div>
            </p>
        </form>
    </div>
    </div>

<?php

mysqli_close($dbcon);
include("footer.php");
