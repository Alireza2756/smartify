<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
$_SESSION['user_id']=-1;
require 'functions.php';
$db=connectToDatabase();
$loginError='';
$registerError='';
if (isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['login']))
{

$statement = $db->prepare('select * from English.users where email=? and password=?');
$statement->bindValue(1,$_POST['email']);
$statement->bindValue(2,md5($_POST['pass']));
$statement->execute();

// did we find a match?
if($row = $statement->fetch(PDO::FETCH_ASSOC))
{
   //login
    $_SESSION['user_id']=$row['id'];
    $_SESSION['username']=$row['username'];
    goToHome();

}else
{
    $loginError='login failed';
}
} elseif(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['register'])){



  $statement = $db->prepare('select * from English.users where email=?');
  $statement->bindValue(1,$_POST['email']);
  $statement->execute();

  if($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  $registerError='this email has been used already';
}else
{
  if(!empty( $_POST["pass"]) && !empty( $_POST["pass2"])){
    if( $_POST["pass"]==$_POST["pass2"]){
      $statement = $db->prepare('insert into English.users(email,password) values(?,?)');
      $statement->bindValue(1,$_POST['email']);
      $statement->bindValue(2,md5($_POST['pass']));
      $statement->execute();
    }else{
      $registerError='passwords are not match';
    }
    
  }
}
 
}



if ($_SESSION['user_id']>0)
{
    echo 'login';
}

?>


<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<title>Login & Registration Form | CoderGirl</title>-->
  <!---Custom CSS File--->
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="login.php" method="post">
        <input name="email" type="text" placeholder="Enter your email">
        <input name="pass" type="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
          <p style="color: red">
             <?php echo $loginError;?>
          </p>
        <input name="login" type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form action="login.php" method="post">
        <input name="email"    type="email"      placeholder="Enter your email">
        <input name="pass"  type="password"   placeholder="Create a password">
        <input name="pass2" type="password"   placeholder="Confirm your password">
        <p style="color: red">
             <?php echo $registerError;?>
          </p>
        <input name="register" type="submit"   class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>

