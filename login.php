<?php
    include 'init.php';


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
    
    
} else {
    $errors[] ='No data received';
}
if (empty($errors) === false){
?>
<?php
   
    echo output_errors($errors);
}

?>