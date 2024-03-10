<?php
include("connect.php");
include("header.php");
?>

<?php

$user=$_SESSION['username'];
$sql = "SELECT COUNT(*) FROM posts";                       
$result = mysqli_query($dbcon, $sql);                      $r=mysqli_fetch_row($result);                            $numrows = $r[0];
                                                        $rowsperpage =PAGINATION;                                 $totalpages = ceil($numrows / $rowsperpage);
                                                         $page = 1;
 if (isset($_GET['page']) && is_numeric($_GET['page'])) {       $page = (INT)$_GET['page'];
 }
 if ($page > $totalpages) {
     $page = $totalpages;
 }

 if ($page < 1) {
     $page = 1;
 }
 $offset = ($page - 1) * $rowsperpage;

 $sql = "SELECT * FROM posts where posted_by='$user' ORDER  BY id DESC LIMIT $offset, $rowsperpage";
 $result = mysqli_query($dbcon, $sql);
$num_post=mysqli_num_rows($result);

if(isset($_SESSION['username'])){

 echo' <div class="container py-5">';


    echo'<div class="row" style="display:flex; justify-content:center; align-item:center">';
     echo' <div class="col-lg-4">';
        echo'<div class="card mb-4">';
          echo'<div class="card-body text-center">';
           echo' <img src="avtar.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">';
            echo'<h4>'.$user.'</h4>';
            echo'<p class="text-muted mb-1">Blog Admin</p>';
            
           echo' <div class="justify-content-center">';
             
            echo' <h4 >Posts <br>'.$num_post.'</h4>';
          echo' <a href="new.php" class="btn btn-primary btn-rounded"> Create New Post</a>';
            echo'</div>';
         echo' </div>';
        echo'</div>';
             echo' </div>';
             echo'</div>';
             echo'</div>';

}
else
{
    echo'<h2 style="text-align:center">Please login first to view your profile</h2>';
}
if(isset($_SESSION['username'])){
if (mysqli_num_rows($result) < 1) {
    
    

    echo '<h2 style="text-align:center;padding-bottom:10px;">No Posts yet!</h2>';
    
} else {
    $dem=0;
  while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    $des = htmlentities(strip_tags($row['description']));
    $time = htmlentities($row['date']);
    $img="./image/".$row['image'];
    $author=$row['posted_by'];

    echo"<input type='hidden' name='id' value=$id>";



    echo'<div class="container">';
          echo'  <article class="card card-style2" style="width:90%;height:750px;">';
    echo' <div class="card-img">';
    if($row['image']!=""){
        echo' <img class="rounded-top" src="'.$img.'" alt="image" style="width:100%;height:500px;padding:12px;object-fit: fill;
">';
    }
    else{

        echo'  <img class="rounded-top" src="nature.jpg" alt="brain.jpg" style="width:100%;height:500px;object-fit: fill;padding:12px;">';
    }
                   echo' <div><span>'.$time.'</span></div>';
              echo'  </div>';
              echo'  <div class="card-body">';
                   echo' <h3 class="h5"><a href="view.php?id='.$id.'">'.$title.'</a></h3>';
                   echo' <p class="display-30">'.substr($des, 0, 100).'</p>';
                  // echo'<button type="submit" class="read-more btn btn-secondary">read more</button>';
                   echo'<a href="view.php?id='.$id.'" class="btn btn-outline-info">Read more..</a>';
              echo'  </div>';
              echo'  <div class="card-footer">';
                   echo' <ul>';
                      echo' <p>Posted by : </p> <li><a href="profile.php?name='.$author.'">'.$author.'</a></li>';
                      // echo' <li><a href="#!"><i class="far fa-comment-dots"></i><span>26</span></a></li>';
                    echo'</ul>';
               echo'</div>';
           echo' </article>';
              echo'</div>';
              

             // echo'</form>';


  }
echo "<p><div class='w3-bar w3-center'>";

if ($page > 1) {
    echo "<a href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
}

$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='w3-teal w3-button'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='w3-button w3-border'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
}

echo "</div></p>";
}
}

?>
<?php

include("footer.php");
