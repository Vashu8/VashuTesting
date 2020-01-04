<?php include('connection.php');?>
<?php include('top.php');?>
  <div class="row">
      <div class="col-md-12 bg-dark text-light">
          <h1 class="text-center">CRUD APP</h1>
      </div>
  </div>
  <div class="row">
      <div class="col-md-3 bg-success">
         <a href="?add=form" class="btn btn-warning btn-block">Add User</a>
          <a href="index.php" class="btn btn-warning btn-block">Show Records</a>
      </div>
      <div class="col-md-9">
          <?php
          if(isset($_GET['add'])){
              ?>
              <form action="" method="post" >
       <label for="">Name</label>
       <input type="text" name="name" class="form-control">
       <label for="">Password</label>
       <input type="password" name="password" class="form-control">
       <label for="">Gender</label>
       <input type="radio" value="male" name="gender" checked>Male
       <input type="radio" value="female" name="gender">Female
       <br>
       <label for="">Mobile</label>
       <input type="text" name="mob" class="form-control">
       <input type="submit" name="sub" class="btn btn-success" value="submit">
   </form>
     <?php
              $con=mysqli_connect("localhost","root","","crud");
              if(isset($_POST['sub'])){
                   $name=$_POST['name'];
                $password=$_POST['password'];
                $gender=$_POST['gender'];
                $mob=$_POST['mob'];
                $query=mysqli_query($con,"insert into crud(name,password,gender,mobile) values('$name','$password','$gender','$mob')");
                  if(mysqli_query($con,$query)){
                      header("location:index.php");
                  }
              }
              ?>
              <?php
          } 
          else{
              ?>
              <h1>User Record</h1>
              <from method="get">
                  <input type="text" name="sname" placeholder="search here">
                  <button type="submit" name="s">Search</button>
              </from>
              <table class="table">
       <tr>
           <th>id</th>
           <th>name</th>
            <th>password</th>
            <th>gender</th>
            <th>mobile</th>
            <th>Edit</th>
            <th>Delete</th>
       </tr>
 
   <?php
              if(isset($_GET['s'])){
                  echo"i m here";
                  die();
                  $sname=extract($_GET);
                 $query_display="select * from crud where name='$sname%'"; 
                  $t=mysqli_num_rows($query_display);
                  if($t>0){
                      
                  }else{
                      echo"<h1>NO RECORD FOUND</h1>";
                  }
              }
    
    $query_display="select * from crud order by id desc";
    $run=mysqli_query($con,$query_display);
    while($data=mysqli_fetch_assoc($run))
    {
        ?>
        <tr>
            <td><?php echo    $data['id'];   ?>  </td>
            <td><?php echo    $data['name'];   ?>  </td>
            <td><?php echo    $data['password'];   ?>  </td>
            <td><?php echo    $data['gender'];   ?>  </td>
            <td><?php echo    $data['mobile'];   ?>  </td>
            <td><a href="edit.php?edit=<?php echo $data['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td><a href="delete.php?del=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i></a></td>
        </tr>
         <?php
          }
          ?>
          </table>
          <?php
          }
          ?>
      </div>
  </div>
  <?php
include("bottom.php");
?>
  
        
       
      