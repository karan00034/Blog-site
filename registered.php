<?php
require("connect.php");
require("header.php");


if(isset($_POST['register'])){
    if($_POST['username']!="" && $_POST['email']!="" && $_POST['password']!=""){
        $user=$_POST["username"];
        $email=$_POST["email"];
        $pass=$_POST["password"];
        $confirmpass=$_POST["confirmpassword"];
        $sql="select username from admin where username='$user'";
        $result=mysqli_query($dbcon,$sql);
        $rows=mysqli_num_rows($result);
        echo $rows;

        if($rows>0){
            echo"<h2 style='text-align:center;'>username already exists!!</h2>";
        }
        else{
            if($pass==$confirmpass){
                $hashpass=password_hash($pass,PASSWORD_DEFAULT);
                $sql="insert into admin(username,password,email) values('$user','$hashpass','$email')";
                $result=mysqli_query($dbcon,$sql);
                echo'<h2 style="text-align:center;"> User Created Successfully!!</h2>';
            }
            else{
                echo"<h2 style='text-align:center;'>Passwords dont match</h2>";
            }

        }
    }
}

?>

<?php

require("footer.php");
