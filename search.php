<?php
require_once 'connect.php';
require_once 'header.php';

if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($dbcon, $_GET['q']);

    $sql = "SELECT * FROM posts WHERE title LIKE '%{$q}%' OR description LIKE '%{$q}%'";
    $result = mysqli_query($dbcon, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo "<h2 style='text-align:center;'> Nothing found.</h2>";
    } else {

      echo "<div class='w3-container w3-padding'>Showing results for $q</div>";

      while ($row = mysqli_fetch_assoc($result)) {

        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
        $des = htmlentities(strip_tags($row['description']));
       // $slug = htmlentities(strip_tags($row['slug']));
        $time = htmlentities($row['date']);
        $img="./image/".$row['image'];
        $author=$row['posted_by'];

       // $permalink = "p/".$id ."/".$slug;

        /*echo '<div class="w3-panel w3-sand w3-card-4">';
        echo substr($des, 0, 100);

        echo '</p><div class="w3-text-teal">';
        echo "<a href='view.php?id='.$id.''>Read more...</a>";

        echo '</div> <div class="w3-text-grey">';
        echo "$time</div>";
        echo '</div>';
         */


        echo'<section>';
    echo'<div class="container">';
          echo'  <article class="card card-style2" style="width:95%;">';
    echo' <div class="card-img">';
    if($row['image']!=""){
        echo' <img class="rounded-top" src="'.$img.'" alt="brain.jpg" style="width:100%;height:300px;padding:12px;object-fit: fill;
">';
    }
    else{

        echo'  <img class="rounded-top" src="brain.jpg" alt="brain.jpg" style="width:100%;height:300px;object-fit: fill;padding:12px;">';
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
                      echo' <p>Posted by : </p> <li><a href="#!"><i class="fas fa-user"></i>'.$author.'</a></li>';
                      // echo' <li><a href="#!"><i class="far fa-comment-dots"></i><span>26</span></a></li>';
                    echo'</ul>';
               echo'</div>';
           echo' </article>';
              echo'</div>';
              echo'</section>';

      }

    }
}
include("footer.php");
