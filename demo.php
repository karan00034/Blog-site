<?php
require("connect.php");
require("header.php");


$id=$_POST["id"];
$name=$_POST["username"];
$email=$_POST["email"];
$text=$_POST["text"];

$sql="insert into comment(id,posted_by,text) values('$id','$name','$text')";

$result=mysqli_query($dbcon,$sql);
if(!$result){
    die("Failed to post comment!!!");
    
}
else{
    echo"<h2 style='text-align:center;'>comment posted successfully</h2>";
}
require("footer.php");
