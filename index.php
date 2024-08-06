<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body><center><h2> STUDENT MANAGEMENT SYSTEM LOGIN</h2>
    <form action="" method="post">
       username<br> <input type="text" name="username" placeholder="Enter username"
       value="<?php    if(isset($_COOKIE['username'])){

echo $_COOKIE['username'];


       } ?>"
       
       
       ><br>
       password<br><input type="password" name="password1" placeholder="Enter password"
       
       value="<?php    if(isset($_COOKIE['password'])){

echo $_COOKIE['password'];


       } ?>"
       
       ><br>
        <br>
        <input type="submit" name="submit" value="login"> Don't have account<a href="account.php"> create account</a>
    </form>
    <?php
    include("connect.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){


     $username=$_POST['username'];
     $password=$_POST['password1'];
     $select=mysqli_query($conn,"SELECT * FROM account where username='$username' AND password1='$password'");
     if(mysqli_num_rows($select))
     {

        $_COOKIE['username']=$username;
        setcookie('username',$username,time() +1800);
        $_COOKIE['password']=$password;
        setcookie('password',$password,time() +1800);
        echo"<script> alert('login succefully');window.location='student.php';</script>";
     }
     else{

        echo"wrong username and password";
     }

    }
    
    
    
    ?>

    
</body>
</html>