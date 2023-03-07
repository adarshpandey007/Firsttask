<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login page</title>
  </head>
  <body>
  <br><br>  
    <h1 class="text-center">Add New Employee</h1>
    <div class="container mt-5">
    <form action="userdata.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">emp_id</label>
    <input type="text" class="form-control" placeholder="Enter Your id" name="emp_id">
</div>  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name</label>
    <input type="text" class="form-control" placeholder="Enter Your name" name="name">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">phone</label>
    <input type="text" class="form-control" placeholder="Enter Your mobile" name="phone">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">city</label>
    <input type="text" class="form-control" placeholder="Enter Your city" name="city">
  </div>

  <input type="submit" name="insert-btn" class="btn btn-primary w-100"/>
</form>
</div>
  </body>
</html>

<?php
  $conn = mysqli_connect('localhost','root','','bemployee');
  if(isset($_POST['insert-btn'])){
  $emp_id= $_POST['emp_id'];
  $name= $_POST['name'];
  $phone= $_POST['phone'];
  $city= $_POST['city'];

  $insert="INSERT INTO bemployee(emp_id,name,phone,city) VALUES('$emp_id','$name','$phone','$city')";
  
  $run_insert=mysqli_query($conn,$insert);
  if($run_insert === true){
    echo "data has been inserted";
  }else{
    echo "not inserted";
  }
  }


//  if(mysqli_connect_errno()){
//    echo "connection not found";
 // }else{
   // echo "connection successful";
//  }
 

?>

<!-- <a class="btn btn-primary" href="userdata.php">UPDATED USER DETAIL</a>
   
