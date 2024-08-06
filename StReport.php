
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student report</title>
    <style>
       a {
    text-decoration: none;
    color: black; /* Default color */
}

a:hover {
    color:red; /* Change color to red on hover */
}



    </style>
</head>
<body><center>
<a href="student.php">Student form</a>
    <a href="logout.php">Logout</a>
    
<h1>STUDENT REPORT</H1></center><BR>
    <?php
    include('connect.php');
    echo"<table border='1'><tr>
    <th>Student ID</th>
    <th>Student fname</th>
    <th>Student lname</th>
    <th>Date of birth</th>
    <th>Gender</th>
    <th>Email</th>
    <th>phone number</th>
    <th>Address</th>
    <th>created_at</th>
    <th>Supdated_at</th>
    <th colspan='2'>Action</th>
    
    ";
    $select="SELECT * FROM student";
    $query=mysqli_query($conn,$select);
    while($f=mysqli_fetch_array($query)){

   
        echo"<tr>";
        echo"<td>".$f['sid']."</td>";
        echo"<td>".$f['fname']."</td>";
        echo"<td>".$f['lname']."</td>";
        echo"<td>".$f['dateOfBirth']."</td>";
        echo"<td>".$f['gender']."</td>";
        echo"<td>".$f['email']."</td>";
        echo"<td>".$f['phone']."</td>";
        echo"<td>".$f['address']."</td>";
        echo"<td>".$f['created_at']."</td>";
        echo"<td>".$f['updated_at']."</td>";
        echo"<td> <a href='delete.php?sid=". $f['sid']."'>Delete</a></td>";
        echo"<td> <a href='update.php?sid=". $f['sid']."'>Edit</a></td>";

        echo"</tr>";
        
        



    }
    echo"</table>";
    
    ?>
</body>
</html>