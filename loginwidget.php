<?php
   if(empty($_POST) === false){
    $username = $_POST['username'];
    $password = $_POST['password'];
        
    if(empty($username) === true or empty($password) === true) {
        $errors[] = 'You need to enter a username and password';
    } else if(user_exists($username) === false){
        $errors[] = 'We can\'t find that username. Have you registered?';
    } else{
        
        if(strlen($password) > 32){
            $errors[] = "Password is too long";
        }
        $login = login($username, $password);
        if ($login === false) {
            $errors[] = 'Your username or password was incorrect';
            
        } else{
            $_SESSION['users_id'] = $login;
            //redirect user part 5 10 minutes
            header('Location: index.php');
            exit();
            
        }
    } 
    
    
}


?>

<div class="block">
<img id="instalogo" src="images/Instagram_logo.png" alt="instagram logo">
<div class="inner" >
 <h3>Login</h3>
  <?php
    if (empty($errors) === false){

   
    echo output_errors($errors);
    }
    ?>
  <form action="" method="post">
  <ul id="login">
      <li>
          <label for="username">Username</label></br>
          <input type="text" name="username" id="username">
          
      </li>
      <li>
          <label for="password">Password</label></br>
          <input type="password" name="password" id="password"></li>
      <li><button type="submit" id="submitbtn">Log in</button> </li>
      <li>
      <a id="register" href="register.php">Not an account yet? Register now!</a></li>
  </ul>
  </form>

</div>
</div>