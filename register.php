<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Imdstagram</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="block">
<img id="instalogo" src="images/Instagram_logo.png" alt="instagram logo">



<?php
include 'init.php';

if(empty($_POST) === false){
    $required_fields = array('username', 'password', 'repeatpassword', 'first_name', 'email');
    foreach($_POST as $key=>$value){
        if (empty($value) && in_array($key, $required_fields) === true){
            $errors[] ='Fields marked with an * are required';
            break 1;
        }
    }
    
    if(empty($errors) === true){
        if(user_exists($_POST['username']) === true){
            $errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
        }
        
        if(strlen($_POST['password']) < 6){
            $errors[] = 'Your password must be at least 6 characters';
        }
        if($_POST['password'] !== $_POST['repeatpassword']){
            $errors[] = 'Your passwords do not match';
        }
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
           $errors[] = 'A valid email address is required';
        }
        if(email_exists($_POST['email']) === true){
            $errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use.';
        }
        
    }
}

if(isset($_GET['success']) && empty ($_GET['success'])){
    echo '<p class="registered">You\'ve been registered successfully!</p><a class="loginredirect" href="index.php">Go to login page.</a>';
    
} else {
    if(empty($_POST) === false && empty($errors) === true){
    $register_data = array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email']
    );
    register_user($register_data);
    header('Location: register.php?success');
    exit();
} 
?>
   <div class="inner">
 <h3>Register</h3>
<?php
    echo output_errors($errors);

?>
<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username*</label></br>
            <input type="text" id="username" name="username">
        </li>
        <li><label for="password">Password*</label></br>
        <input type="password" id="password" name="password"></li>
        <li><label for="repeatpassword">Repeat Password*</label></br>
        <input type="password" id="repeatpassword" name="repeatpassword"></li>
        <li>
            <label for="firstname">First name*</label></br>
            <input type="text" id="firstname" name="first_name">
        </li>
        <li>
            <label for="lastname">Last name</label></br>
            <input type="text" id="lastname" name="last_name">
        </li>
        <li>
            <label for="email">Email*</label></br>
            <input type="text" id="email" name="email">
        </li>
        <li><button type="submit" id="submitbtn">Register</button> </li>
    </ul>
</form>
</div>
</div> 
</body>
</html>  




<?php
}
?>