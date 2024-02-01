<?php include('dbcon.php');?>
<?php
if(isset($_POST['addstudents'])){
    
    $f_name=$_POST['fname'];
    $l_name=$_POST['lname'];
    $age=$_POST['age'];

    if(empty($f_name)){
        header('location:index.php?message=You need to fill in the first name!');
        exit();
    }
    else{
        $query="insert into `students`(`first_name`,`last_name`,`age`) 
        values('$f_name','$l_name','$age')";

        $result=mysqli_query($connection,$query);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }
        else{
            header('location:index.php?insert_msg=Your data has been added successfully');
            exit();
        }
    }
}


?>