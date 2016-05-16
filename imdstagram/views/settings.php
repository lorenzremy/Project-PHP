<?php
    
    session_start();
    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
    }

	//Include all classes
	spl_autoload_register(function ($class) {
		include '../classes/' . $class . '.class.php';
	});

    $user = new User(); 
    $user->getDataFromDatabase($_SESSION['user']);

    if(!empty($_POST)){

        if(!isset($_POST['private'])){
            $_POST['private'] = null;
        }

        $user->changeProfile($_SESSION['user'], $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['private'], $_FILES['profilePicture']);
    }

    if(!empty($_GET)){
        $user->deleteAccount();
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Settings | IMDstagram</title>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php include_once("header.php"); ?>

            <div class="settingsMain">
                <h1 class="h1Settings">Settings</h1>

                <div class="alert alert-warning save-warning" role="alert">
                    You have unsaved changes. Be sure to save this form before leaving.
                </div>
                <?php if(!empty($_POST) && $user->showFeedback()): ?>
                    <?php echo $user->showFeedback(); ?>
                <?php endif; ?>
    
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="h3Settings">Personal data</h3>
                    <div class="settingInput">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" placeholder="E-mail" value="<?php echo $user->Email; ?>" class="form-control">

                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $user->Firstname; ?>" class="form-control">

                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $user->Lastname; ?>" class="form-control">

                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $user->Username; ?>" class="form-control">
                    </div>
                   
                    
                    <img src="../public/users/<?php echo $user->Avatar; ?>.png" class="profile-picture" id="profpic">
                    <label for="profilePicture">Profile picture</label>
                    <input type="file" name="profilePicture" id="profilePicture">

                    <h2>account onzichtbaar maken voor anderen?</h2>

                    <?php if($user->Private): ?>
                        <input type="checkbox" name="private" checked> Private account
                    <?php else: ?>
                        <input type="checkbox" name="private"> Private account
                    <?php endif; ?><br>
                    
                    
                    
                    <button type="button" id="deleteAccount" class="btn btn-danger">Delete account</button>
                    
                    <button type="submit" id="updateSettings" class="btn btn-primary btn-lg">Update settings</button>
                </form>

                <form action="" method="get" class="deleteAccountForm">
                    <input type="text" value="DELETING ACCOUNT" name="deleteAccount" hidden>
                    <input type="submit" class="btn btn-danger" value="DELETE ACCOUNT NOW" >
                </form>
            </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
            $(".save-warning").hide();
            $('input').change(function(){

                $(".save-warning").fadeIn();

            });

            $(".deleteAccountForm").hide();
            $("#deleteAccount").click(function(){
                $(".deleteAccountForm").fadeIn();
            });
        </script>


    </body>

    </html>