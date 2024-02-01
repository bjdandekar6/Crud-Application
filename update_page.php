<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed" . mysqli_error($connection));
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
if(isset($_POST["updatestudents"])){
    if(isset($_GET["id_new"])){
        $idnew = $_GET["id_new"];
    }
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];

    $query = "UPDATE `students` SET `first_name`='$fname', `last_name`='$lname', `age`='$age' WHERE `id` = '$idnew'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed" . mysqli_error($connection));
    }
    else{
        header('location:index.php?update_msg=You have successfully updated the data.');
        exit();
    }
}
?>

<form action="update_page.php?id=<?php echo $id; ?>&id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" class="btn btn-dark" name="updatestudents" value="UPDATE">
</form>

<?php include('footer.php'); ?>
