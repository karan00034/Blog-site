<?php
require_once 'connect.php';
require_once 'header.php';
require_once 'security.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST ['description']);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);


    $filename =$_FILES["uploadfile"]["name"];       
    $tempname=                                 $_FILES["uploadfile"]["tmp_name"];                    $folder = "./image/" . $filename;

    $sql = "INSERT INTO posts (title, description,posted_by, date,image) VALUES('$title', '$description', '$posted_by', '$date','$filename')";
    mysqli_query($dbcon, $sql) or die("failed to post" . mysqli_connect_error());

    
if($filename!=""){
    if (move_uploaded_file($tempname, $folder)) {
        // echo "<h3 style='text-align:center;'>  Image uploaded successfully!</h3>";
        echo"";
    } else {
        // echo "<h3 style='text-align:center;'>  Failed to upload image!</h3>";
        echo"";
    }
}
    printf("<h2 style='text-align:center;'>Posted successfully.</h2> <meta http-equiv='refresh' content='2; url=%s'/>",
       "index.php");
 
$msg = "";
}else {
    ?>
    <div class="w3-container">
        <div class="w3-card-4">
            <div class="w3-container w3-teal">
                <h2>New Post</h2>
            </div>

        <form class="w3-container" method="POST" enctype="multipart/form-data">

                <p>
                    <label>Title</label>
                    <input type="text" class="w3-input w3-border" name="title" required>
                </p>

                <p>
                    <label>Description</label>
                    <textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
                </p>
     

<div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            
               

 <p>
                    <input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
                </p>
            </form>

        </div>
    </div>
    <?php
}

include("footer.php");
