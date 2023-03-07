<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Detail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>USER VIEW</h2>
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>EMPID</th>
        <th>NAME</th>
        <th>PHONE</th>
        <th>CITY</th>
        <th>DELETE</th>
        <th>UPDATE</th>

      </tr>
    </thead>
    <tbody>
    <?php
    $conn = mysqli_connect('localhost','root','','bemployee');
    $select= "SELECT * FROM bemployee";
    $run=mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){
    $emp_id= $row_user['emp_id'];
    $name= $row_user['name'];
    $phone= $row_user['phone'];
    $city= $row_user['city'];

    ?>
      <tr>
        <td><?php echo $emp_id ; ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $phone ; ?></td>
        <td><?php echo $city ; ?></td>
        <td><a class="btn btn-danger" href="user.php?del=<?php echo $empid;?>">delete</a></td>
        <td><a class="btn btn-success" href="edit.php?edit=<?php echo $empid;?>">update</a></td>
      </tr>
      <?php } ?>
      
    </tbody>
  </table>
</div>
<div>
    <a class="btn btn-primary" href="adduser.php">ADD NEW EMPLOYEE</a>
</div>


</body>
</html>