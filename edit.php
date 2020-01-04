<?php
include("connection.php");
include("top.php");
if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $query=mysqli_query($con,"select * from crud where id='$id'") or die(mysqli_error($con));
    $data= mysqli_fetch_assoc($query);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2>Edit Your Data</h2>
                <a href="index.php" class="btn btn-info">Go Back</a>
                <form action="" method="post">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password" value="<?php echo $data['password'];?>">
                    <label for="">Gender</label>
                    <input type="radio"  name="gender" value="male"<?php 
                        if($data['gender']=="male"){
                            echo"checked";
                        }
                    ?>>Male 
                    <input type="radio"  name="gender" value="female"<?php 
                     if($data['gender']=="female"){
                            echo"checked";
                        }
                    ?>>Female
                    <br>
                     <label for="">Mobile</label>
                    <input type="text" class="form-control"  value="<?php echo $data['mobile'];?>"name="mobile">
                    <input type="submit" name="sub" class="btn btn-success" value="submit">
                </form>
                <?php
                    if(isset($_POST['sub'])){
                        extract($_POST);
                        if(mysqli_query($con,"update crud set name='$name', mobile='$mobile', password='$password', gender='$gender' where id='$id'") or die(mysqli_error($con))){
                            header("location:index.php");
                        }
                    }
    ?>
            </div>
                <div class="col-md-2"></div>
        </div>
    </div>
                <?php
                
}
include("bottom.php");
?>