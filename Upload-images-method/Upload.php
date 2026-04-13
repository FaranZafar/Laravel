<?php
   include('dbconnection.php');
   if(isset($_POST['submit'])){
    $file_name=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $name=$_POST['name'];
    //folder name in which we want to store images
    $folder='upimages/'.$file_name;

    // Escape user input to prevent SQL injection
    $file_name = mysqli_real_escape_string($con, $file_name);
    $name = mysqli_real_escape_string($con, $name);

    //insert query - fixed: added 'name' column
    $query=mysqli_query($con,"insert into images (file, name) values ('$file_name','$name') ");

    if(move_uploaded_file($tempname,$folder) && $query){
       echo"<h2>File uploaded successfully</h2>";
    }else{
        echo "<h2>File not Uploaded </h2>";
    } 
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
   <form method="POST" enctype="multipart/form-data">
     <input type="file" name="image" >
     <br><br>
     <input type="text" name="name">
     <br><br>
     <button type="submit" name="submit">Submit</button>
   </form>

   <div class="card">
    <?php
     $res=mysqli_query($con,"select * from images");
     while($row=mysqli_fetch_assoc($res)){

    
    ?>
    <img class="rounded card-header" src="upimages/<?php echo $row['file']?>" alt="<?php echo $row?>">
  <?php }?>
</div>
</body>
</html>