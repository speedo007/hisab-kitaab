<?php
session_start();
if(isset($_POST['logout'])){
  session_destroy();
  header('location:index.php');
}
$link=mysqli_connect("localhost","root","","hisab");
$email=$_SESSION['email'];
$query="SELECT * FROM `pass` WHERE email='$email'";
$text="";
$result=mysqli_query($link,$query);
  // if($result){
  //   $i=1;
  //   while($row=mysqli_fetch_array($result))
  //   {
  //   echo $i." pass: ".$row['pass']."<br>";
  //   $i++;
  //   }
  // }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="pass.css">
    <title>Hello, world!</title>

  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" >
     
     <form method="post">
     <button class="top my-btn mr-auto" type="submit" name ="hisab"><i class="fas fa-sign-in-alt"></i>Hisab</button></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


      <ul class="navbar-nav ml-auto">

         <li class="nav-item">
        <button type="submit" name ="logout" class="top my-btn"><i class="fas fa-sign-in-alt"></i>Logout</button></a>
        </li>
      </ul>
   </form>


  </nav>
</div>
<div class="text">
<form method="post">
<div class="form-group txt container-fluid" >
   <textarea class="form-control notes" id="diary" rows="3" name="contents"><?php    if($result){
       $i=1;
       while($row=mysqli_fetch_array($result))
       {
       echo $i." pass: ".$row['pass']."\n";

       $i++;
       }
     } ?></textarea>
 </div>
 <div class="container but ml-auto">
   <a href="hisab.php" ><button type="button" class="btn btn-info" style="font-size:50px;margin-top:20px;padding-bottom:20px;float:left;position:relative;">Go to Home</button></a>
 </div>

</form>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
