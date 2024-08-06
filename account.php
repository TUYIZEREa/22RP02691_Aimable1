<?php
$username=$password=$email=$prepass ="";
$usernameErr=$passwordErr=$emailErr=$prepassErr="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['username'])){
        $usernameErr="username is required!";



    }else{
        $username=test_input($_POST['username']);
        if(!preg_match("/^[A-Za-z\s]+$/",$username)){
            $usernameErr="invaild username";

        }
    }
    if(empty($_POST['password1'])){

        $passwordErr="password is required";
    }
    else{

        $password=test_input($_POST['password1']);
       if(!preg_match("/^[A-Za-z0-9]{8,}$/",$password)){
        $passwordErr="use lower and upper case in password ,atleast 8 charactors!";

       }

       }
       if(!($prepass==$password)){
        $prepassErr="password not vaild!";
       }
       if(empty($_POST['email'])){
        $emailErr="email is required!!";
       }
       else {
        $email=test_input($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $emailErr="wrong format email";
        }
       }
    }
    function test_input($data){

        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;

    }
    




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account</title>
</head>
<body><center>
    <form action="" method="post">
        <h1> CREATE ACCOUNT NOW </H1><BR>
        Username<br><input type="text" name="username" placeholder="enter username"><br>
        <i><?php echo $usernameErr?></i><br>
        password<br><input type="password" name="password1" placeholder="Enter your password"><br>
        <i><?php echo $passwordErr?></i><br>
        Confirm_password<br><input type="password" name="pass" placeholder="confirm password"><br>
        <i><?php echo $prepassErr?></i><br>
        Email<br><input type="email" name="email" placeholder="Enter your email"><br>
        <i><?php echo $emailErr?></i><br>
        <br>
        <input type="submit" name="submit" value="create">

    </form>
    <?php
    include("connect.php");
    if($_SERVER['REQUEST_METHOD']=='POST'&&empty($usernameErr)&&empty($passwordErr)&&empty($emailErr)){

        $user=$_POST['username'];
        $pass=$_POST['password1'];
        $email=$_POST['email'];
        if(mysqli_query($conn,"INSERT INTO account(username,password1,email) values('$user','$pass','$email')")){

            echo"<script> alert('Acount created successfully');window.location='index.php';</script>";
        }
        else{
            echo"<script> alert('error in account creation');</script>";
        }

        
    }
    

    ?>
</body>
</html>