<?php
//require_once 'functions.php';
require_once 'config.php';

if (!empty(SITE_ROOT)){
    $url_path = "/".SITE_ROOT."/";
} else{
    $url_path = "/";
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale=1">
    <title>PHP Blog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="blog.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<body>

<!--
<header class="w3-container w3-teal">
    <h1>PHP Blog</h1>
</header>
-->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

 
<!-- Navbar -->                                   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">                                            <!-- Container wrapper -->                        <div class="container-fluid">                         <!-- Navbar brand -->                             <a class="navbar-brand mt-2 mt-lg-0" href="#">                                                          <h5 class="pt-1">PHP Blog</h5>                     </a>                                              <!-- Toggle button -->                                                                 
   </div>                                       

               </nav>




<div class="w3-bar w3-border">
    <a href="index.php" class="w3-bar-item w3-button w3-pale-green">Home</a>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<a href='new.php' class='w3-bar-item w3-btn'>New Post</a>";
        echo "<a href='admin.php' class='w3-bar-item w3-btn'>Admin Panel</a>";
        echo "<a href='logout.php' class='w3-bar-item w3-btn'>Logout</a>";
        echo"<a href='my_profile.php' class='w3-bar-item w3-btn'>Profile</a>";
    } else {
        echo "<a href='login.php' class='w3-bar-item w3-pale-red' >Login</a>";
        echo "<a href='register.php' class='w3-bar-item w3-pale-red' >Register</a>";
    }
    ?>
</div>

<div class="w3-container" style="padding:20px;   ">
    <form action="search.php" method="GET" class="w3-container">
        <p>
            <input type="text" name="q" class="w3-input w3-border" placeholder="Search for anything" style="border-radius:12px;"  required>
        </p>
        <p>
        <input type="submit" class="w3-btn w3-teal w3-round" style="border-radius:12px;" value="Search">
        </p>
    </form>
</div>
