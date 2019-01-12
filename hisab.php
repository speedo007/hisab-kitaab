<?php
session_start();
// if(isset($_SESSION['email']))
// {
//   header('Location:pass.php');
// }
if(isset($_POST['pass'])){
  header('location:pass.php');
}
if(isset($_POST['notes'])){
  header('location:notes.php');
}
if(isset($_POST['logout'])){
  session_destroy();
  header('location:index.php');

}
if(isset($_POST['cash'])){
  $link=mysqli_connect("localhost","root","","hisab");
  if(mysqli_connect_error()){
    die("error in connecting");
  }
  else {
    $c = "your cash total is".$_POST['display']."";
  //  echo $c;
    $query="INSERT INTO `pass` (`email`,`pass`) values ('".mysqli_real_escape_string($link,$_SESSION['email'])."','".$c."')";
        $result=mysqli_query($link,$query);
        if($result){
          echo'<script>alert("done adding");</script>';
         //$_SESSION['email']=$_POST['email'];

        }
        else{
          echo mysqli_error($link);
        }
  }
}
if(isset($_POST['paytm'])){
  $link=mysqli_connect("localhost","root","","hisab");
  if(mysqli_connect_error()){
    die("error in connecting");
  }
  else {
    $c = "your paytm total is".$_POST['display']."";
  //  echo $c;
    $query="INSERT INTO `pass` (`email`,`pass`) values ('".mysqli_real_escape_string($link,$_SESSION['email'])."','".$c."')";
        $result=mysqli_query($link,$query);
        if($result){
          echo'<script>alert("done adding");</script>';
         //$_SESSION['email']=$_POST['email'];

        }
        else{
          echo mysqli_error($link);
        }
  }
}
if(isset($_POST['Debit'])){
  $link=mysqli_connect("localhost","root","","hisab");
  if(mysqli_connect_error()){
    die("error in connecting");
  }
  else {
    $c = "your debit/credit total is".$_POST['display']."";
  //  echo $c;
    $query="INSERT INTO `pass` (`email`,`pass`) values ('".mysqli_real_escape_string($link,$_SESSION['email'])."','".$c."')";
        $result=mysqli_query($link,$query);
        if($result){
          echo'<script>alert("done adding");</script>';
         //$_SESSION['email']=$_POST['email'];

        }
        else{
          echo mysqli_error($link);
        }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
<link rel="stylesheet" href="hisab.css">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" >
     <a class="navbar-brand" href="#" style="color:#fff ; background: #343a40 ;font-size:30px;">Hisaab Kitaab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


      <ul class="navbar-nav ml-auto">
         <form method="post">
         <li class="nav-item">
         <button type="submit" name ="logout" class="top my-btn"><i class="fas fa-sign-in-alt"></i>Logout</button>
        </li>
      </form>
      </ul>

    </div>
  </nav>
  <div class="container ">
    <form name="calculator" method="post">
     <table>
        <tr>
           <td colspan="4">
              <input type="text" name="display" id="display" >

           </td>
        </tr>
        <tr>
              <td><input type="button" name="one" value="1" onclick="calculator.display.value += '1'"></td>
              <td><input type="button" name="two" value="2" onclick="calculator.display.value += '2'"></td>
              <td><input type="button" name="three" value="3" onclick="calculator.display.value += '3'"></td>
              <td><input type="button" class="operator" name="plus" value="+" onclick="calculator.display.value += '+'"></td>
       </tr>
       <tr>
              <td><input type="button" name="four" value="4" onclick="calculator.display.value += '4'"></td>
              <td><input type="button" name="five" value="5" onclick="calculator.display.value += '5'"></td>
              <td><input type="button" name="six" value="6" onclick="calculator.display.value += '6'"></td>
              <td><input type="button" class="operator" name="minus" value="-" onclick="calculator.display.value += '-'"></td>
       </tr>
       <tr>
              <td><input type="button" name="seven" value="7" onclick="calculator.display.value += '7'"></td>
              <td><input type="button" name="eight" value="8" onclick="calculator.display.value += '8'"></td>
              <td><input type="button" name="nine" value="9" onclick="calculator.display.value += '9'"></td>
              <td><input type="button" class="operator" name="times" value="x" onclick="calculator.display.value += '*'"></td>
       </tr>
       <tr>
              <td><input type="button" id="clear" name="clear" value="c" onclick="calculator.display.value = ''"></td>
              <td><input type="button" name="zero" value="0" onclick="calculator.display.value += '0'"></td>
              <td><input type="button" name="doit" value="=" onclick="calculator.display.value = eval(calculator.display.value)"></td>
              <td><input type="button" class="operator" name="div" value="/" onclick="calculator.display.value += '/'"></td>

        </tr>
     </table>



<nav class="navigation">
  <ul class="mainmenu">
    <button class="btn-lg btn-success text-white" type="submit"  name="cash">Cash</button>
    <button class="btn-lg btn-success text-white" type="submit"  name="paytm">Paytm</button>
    <button class="btn-lg btn-success text-white" type="submit"  name="Debit">debit/Credit</button>
    <button class="btn-lg btn-success text-white" type="submit"  name="pass">Passbook</button>
    <button class="btn-lg btn-success text-white" type="submit"  name="notes">Notes</button>
  </ul>
</nav>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  </body>
</html>
