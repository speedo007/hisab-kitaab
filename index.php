<?php
session_start();
if(isset($_SESSION['email'])){
  header('location:hisab.php');
}
 $error="";
 if(isset($_POST['submit']))
 {
   $link=mysqli_connect("localhost","root","","hisab");
   if(mysqli_connect_error()){
     die("there was an error connecting to the database");
   }
   else{
     if(!$_POST['email'])
     {
       $error.="plz enter email<br>";

     }
     else if(!$_POST['password'])
     {
       $error.="plz enter password<br>";
     }
     else if(!$_POST['rpassword'])
     {
       $error.="plz repeat ur password";
     }
     else if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL===false)) {
   $error.="  the email is invalid<br>";
   }
   else{
     $query="SELECT `id` FROM `users` WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
     $result= mysqli_query($link,$query);
     if(mysqli_num_rows($result)>0){
       $error.="email already taken";
     }
     else{
       if($_POST['password']!=$_POST['rpassword'])
       {
         $error.="plz repeat password correctly";
       }
       else{
       $query = "INSERT INTO `users` (`email`,`password`,`rpassword`) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."','".mysqli_real_escape_string($link,$_POST['rpassword'])."')";
       $result= mysqli_query($link,$query);
       if($result){
         $_SESSION['email']=$_POST['email'];
         header('Location:hisab.php');
       }
       else{
         $error.="problem signing you up";
       }
     }
     }
   }
   }
   if($error!="")
   {
     $error='<div class="alert alert-danger" role="alert"><p><strong>Oops</strong></p><br>'.$error.'</div>';
   }
 }
 if(isset($_POST['abcd'])){
    $link = mysqli_connect("localhost","root","","hisab");
    if(mysqli_connect_error())
    {
      die("couldnt connect");
    }
    else
    {
   if(!$_POST["email1"])
   {
     $error.="Please fill E-mail<br>";
   }
   else if(!$_POST["password1"])
   {
     $error.="Please fill Password<br>";
   }
   else if ($_POST['email1'] && filter_var($_POST["email1"], FILTER_VALIDATE_EMAIL===false)) {
    $error.="  the email is invalid<br>";
   }
   else {
   $query="SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST["email1"])."'";
   if($result=mysqli_query($link,$query)){

       if(mysqli_num_rows($result)>0)
       {
          $row=mysqli_fetch_array($result);
          if($row['password']==$_POST['password1']){

            $_SESSION['email']=$_POST['email1'];
            header('location:hisab.php');
        }
        else{
          $error.="check your password";
        }
       }
       else {
         $error.="entered wrong id or password";
       }


   }
 }
}
  if($error!="")
  {
    $error='<div class="alert alert-danger" role="alert"><p><strong>Oops</strong></p><br>'.$error.'</div>';
  }

 }
 // session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <h1 style="font-size:80px">
        Hisaab Kitaab
      </h1>

    </div>

    <div class="logmod">
  <div class="logmod__wrapper">
    <span class="logmod__close">Close</span>
    <div class="logmod__container">
        <div id="error"><?php echo $error; ?></div>
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-2"><a href="#">Login</a></li>
        <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
        </div>
        <div class="logmod__form">
          <form accept-charset="utf-8" action="#" class="simform" method="post">
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Email*</label>
                <input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" name="email" size="50" />
              </div>
            </div>
            <div class="sminputs">
              <div class="input string optional">
                <label class="string optional" for="user-pw">Password *</label>
                <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="text" name="password" size="50" />
              </div>
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Repeat password *</label>
                <input class="string optional" maxlength="255" id="user-pw-repeat" placeholder="Repeat password" type="text" size="50" name="rpassword" />
              </div>
            </div>
            <div class="simform__actions">
              <button class="sumbit" name="submit" type="sumbit" value="Create Account" >Create Account</button>
              <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
            </div>
          </form>
        </div>

      </div>
      <div class="logmod__tab lgm-2">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Enter your email and password <strong>to sign in</strong></span>
        </div>
        <div class="logmod__form">
          <form accept-charset="utf-8" action="#" class="simform" method="post">
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Email*</label>
                <input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" name="email1"/>
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-pw">Password *</label>
                <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="password" name="password1" size="50" />
                						<span class="hide-password">Show</span>
              </div>
            </div>
            <div class="simform__actions">
              <button class="sumbit" name="abcd" type="sumbit" value="Log In" >Login</button>
              <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
            </div>
          </form>
        </div>

          </div>
      </div>
    </div>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    var LoginModalController = {
    tabsElementName: ".logmod__tabs li",
    tabElementName: ".logmod__tab",
    inputElementsName: ".logmod__form .input",
    hidePasswordName: ".hide-password",

    inputElements: null,
    tabsElement: null,
    tabElement: null,
    hidePassword: null,

    activeTab: null,
    tabSelection: 0, // 0 - first, 1 - second

    findElements: function() {
        var base = this;

        base.tabsElement = $(base.tabsElementName);
        base.tabElement = $(base.tabElementName);
        base.inputElements = $(base.inputElementsName);
        base.hidePassword = $(base.hidePasswordName);

        return base;
    },

    setState: function(state) {
        var base = this,
            elem = null;

        if (!state) {
            state = 0;
        }

        if (base.tabsElement) {
            elem = $(base.tabsElement[state]);
            elem.addClass("current");
            $("." + elem.attr("data-tabtar")).addClass("show");
        }

        return base;
    },

    getActiveTab: function() {
        var base = this;

        base.tabsElement.each(function(i, el) {
            if ($(el).hasClass("current")) {
                base.activeTab = $(el);
            }
        });

        return base;
    },

    addClickEvents: function() {
        var base = this;

        base.hidePassword.on("click", function(e) {
            var $this = $(this),
                $pwInput = $this.prev("input");

            if ($pwInput.attr("type") == "password") {
                $pwInput.attr("type", "text");
                $this.text("Hide");
            } else {
                $pwInput.attr("type", "password");
                $this.text("Show");
            }
        });

        base.tabsElement.on("click", function(e) {
            var targetTab = $(this).attr("data-tabtar");

            e.preventDefault();
            base.activeTab.removeClass("current");
            base.activeTab = $(this);
            base.activeTab.addClass("current");

            base.tabElement.each(function(i, el) {
                el = $(el);
                el.removeClass("show");
                if (el.hasClass(targetTab)) {
                    el.addClass("show");
                }
            });
        });

        base.inputElements.find("label").on("click", function(e) {
            var $this = $(this),
                $input = $this.next("input");

            $input.focus();
        });

        return base;
    },

    initialize: function() {
        var base = this;

        base
            .findElements()
            .setState()
            .getActiveTab()
            .addClickEvents();
    }
};

$(document).ready(function() {
    LoginModalController.initialize();
});

    </script>
  </body>
</html>
