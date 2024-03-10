<?php
require_once 'connect.php';
require_once 'header.php';

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: $url_path");
}
$sql = "Select * FROM posts WHERE id = $id";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: $url_path");
}

$hsql = "SELECT * FROM posts WHERE id = $id";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$author = $row['posted_by'];
$time = $row['date'];
$img="./image/".$row['image'];
$sql="select posted_by,text from comment where id = $id";
$rest=mysqli_query($dbcon,$sql);

$num_comments=mysqli_num_rows($rest);
//$row=mysqli_fetch_assoc($result);
//$posted_by=$row["posted_by"];
//$text=$row["text"];


echo '<div id="main-content" class="blog-page">';
       echo' <div class="container">';
          echo'<div class="row clearfix">';
               echo' <div class="col-lg-8 col-md-12 left-box">';
                    echo'<div class="card single_post" style="padding-bottom:5px;">';
                       echo' <div class="body">
                            <div class="img-post">';
if($row["image"]==""){

    // echo' <img class="d-block img-fluid" src="https://www.bootdey.com/image/800x280/87CEFA/000000" alt="First slide">';
    echo' <img class="d-block img-fluid" src="nature.jpg" alt="default image">';
}
else{

echo' <img class="d-block img-fluid"              src="'.$img.'" alt="First slide">';
}
                            echo'</div>';
                            echo'<h2 class="card-title">'.$title.'</h3>';
                            echo'<p>'.$description.'</p>';
                            echo "Posted by: " . $author . "<br>";            echo "$time";
                        echo'</div>';
                    echo'</div>';
                           
                           
echo'<div class="card">';
echo'<div class="header">';
if($num_comments<1){
    echo"<h2>No Comments yet!!</h2>";
}
else{


                                echo'<h2>Comments '.$num_comments.'</h2>';
                              
}
                                echo'</div>';
 
echo'<div class="body">';
echo'<ul class="comment-reply list-unstyled">';
while ($row = mysqli_fetch_assoc($rest)) {
    $sender=$row["posted_by"];                       $cmt=$row["text"];
   
 echo'<li class="row clearfix">';
                                        echo'<div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Awesome Image"></div>';
                                        echo'<div class="text-box col-md-10 col-8 p-l-0 p-r0">';
                                                                   echo'<h5 class="m-b-0">'.$sender.' </h5>';
                                            echo'<p>'.$cmt.' </p>';
                                            echo'<ul class="list-inline">';
                                                echo'<li><a href="">Mar 09 2018</a></li>';
                                                echo'<li><a href="">Reply</a></li>';
                                            echo'</ul>';
 echo'</div>';
  echo'</li>';

 }                           

                            
echo'</ul>';
echo'</div>';
                                                echo'</div>';



                                               
                                                echo'<div class="card">';
    echo'<div class="header">';
         echo'<h2>Leave a reply <small>Your email address will not be published. Required fields are marked*</small></h2>';
                echo'</div>';
            echo'<div class="body">';
            echo'<div class="comment-form">';
            echo'<form class="row clearfix" method="POST" action="demo.php">';
            echo'<input type="hidden" name="id" value='.$id.'>';
                                        echo'<div class="col-sm-6">';
           
echo'<div class="form-group">';
                                                echo'<input type="text" class="form-control" placeholder="Your Name" name="username">';
                                            echo'</div>';
                                        echo'</div>';
                                        echo'<div class="col-sm-6">';
                                            echo'<div class="form-group">';
                                                echo'<input type="text" class="form-control" placeholder="Email Address" name="email">';
                                            echo'</div>';
                                        echo'</div>';
                                        echo'<div class="col-sm-12">';
                                            echo'<div class="form-group">';
                                                echo'<textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..." name="text"></textarea>';
                                            echo'</div>';
                                            echo'<button type="submit" class="btn btn-block btn-primary">SUBMIT</button>';
                  echo'</div>';
                     echo'</form>';
                   echo'</div>';
                 echo'</div>';
            echo'</div>';
                                            echo'</div>';




                                            
                


?>


<?php
if (isset($_SESSION['username'])) {
    ?>

 <span style="padding:5px;">
<a class="btn btn-primary" style="width:30%;" href="edit.php?id=<?php echo $id; ?>">Edit</a>



        <a class="btn btn-danger" style="width:30%;" href="del.php?id=<?php echo $id; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">Delete</a>


</span>
<?php

}
echo'</div>';
echo'</div>';
?>

<?php
include("footer.php");
