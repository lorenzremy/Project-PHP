<?php 

    include_once("../classes/User.class.php");

    if(!empty($_POST))
    {
        try
        {  
            $user = new User();
            $user->Firstname = $_POST['firstname'];
            $user->Lastname = $_POST['lastname'];
            $user->Username = $_POST['username'];
            $user->Email = $_POST['register_email'];
            $user->Password = $_POST['register_password'];
            $user->ConfirmPassword = $_POST['confirm_register_password'];
		    $user->register();
        }
        catch(exception $e)
        {
            $error = $e->getMessage();
        }
	}

?><!DOCTYPE html>
<html>
	<head>
		<title>IMDstagram</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/reset.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body class="home">
		<div class="login">
		    <img id="instalogo" src="../images/Instagram_logo.png" alt="instagram logo">
			<form action="" method="post">
                <?php if(isset($error) && !empty($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                <label for="firstname">First name</label>
				<input type="text" name="firstname" class="textfield" placeholder="First name">
                <label for="lastname">Last name</label>
				<input type="text" name="lastname" class="textfield" placeholder="Last name">
				<label for="username">Username</label>
				<input type="text" name="username" class="textfield" placeholder="Username">
				<label for="register_email">E-mail</label>
				<input type="text" name="register_email" class="textfield" placeholder="E-mail">
				<label for="register_password">Password</label>
				<input type="password" name="register_password" class="textfield" placeholder="Password">
                <label for="confirm_register_password">Confirm password</label>
				<input type="password" name="confirm_register_password" class="textfield" placeholder="Confirm password">
				<button type="submit" class="submitbtn">Register</button><br>
				<a href="index.php" class="return">Go back to log in page.</a>
			</form>
		</div>
	</body>
</html>






















