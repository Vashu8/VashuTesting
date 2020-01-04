<?php
if(isset($_GET['del']))
{
    echo $id=$_GET['del'];
    include("connection.php");
    if(mysqli_query($con,"delete from crud where id='$id'"))
    {
        header("location:index.php");
    }
}
?>