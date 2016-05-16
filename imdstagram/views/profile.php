<?php
      
    session_start();

    if(empty($_SESSION['user'])){
        header("Location: index.php");
    }else{

        spl_autoload_register(function ($class) {
            include_once '../classes/' . $class . '.class.php';
        });   

        $user = new User();
        $user->Id = $_GET['id'];
        if($user->checkIfUserExists()){
            $user->getDataFromDatabase();
        }else{
            header("Location: 404.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>IMDstagram</title>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="../css/cssgram.min.css" rel="stylesheet">
    </head>

    <body>

        <?php include_once("header.php"); ?>

       <div class="alles">
            <div class="profile">
                <div class="About">

                   <div>
                        <h1 class="h1Profile"><?php echo $user->Firstname . " " . $user->Lastname; ?></h1>
                        <h3 class="h3Profile">@<?php echo $user->Username; ?></h2>
                        <form action="settings.php" class="formProf">
                            <input type="submit" value="Edit profile">
                        </form>
                    </div>

                    <img class="profile-picture" src="<?php echo $user->Avatar; ?>">
                    <br class=“clearfix”>

                </div>

                <div class="profile-information">
                    <div class="profile-information-item">
                        <span>Photos</span>
                        <span class="amount"><?php echo $user->PhotosNr; ?></span>
                    </div>
                    <div class="profile-information-item">
                        <span>Followers</span>
                        <span class="amount"><?php echo $user->FollowersNr; ?></span>
                    </div>
                    <div class="profile-information-item">
                        <span>Following</span>
                        <span class="amount"><?php echo $user->FollowingNr; ?></span>
                    </div>
                    <div class="profileFollow">
                    <?php

                        if($user->checkFollow()){
                            echo'<input id="follow" name="follow" type="submit" value="follow" >';
                            echo '<input id="unfollow" name="following" type="submit" value="following" style="display:none;">';
                        }else{
                            echo'<input id="follow" name="follow" type="submit" value="follow" style="display:none;">';
                            echo '<input id="unfollow" name="following" type="submit" value="following">';
                        }

                    ?>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        
        </div>
        <div class="profile-grid container-fluid">
            <div class="postsProfile">
            <?php

                $posts = $user->loadProfile();

                if(count($posts) == 0):
                    echo "<p>There are no posts at this moment</p>";
                else: 

                for($i = 0; $i < count($posts); $i++):
                    $filter = $posts[$i]->Filter;
                    if(!empty($filter)){
                        echo '<div class="col-md-4 profile-grid-image-container" data-index="'.$posts[$i]->Id.'"><figure class="'.$filter.'"><div class="profile-grid-image" style="background-image: url('.$posts[$i]->Path.')"></div></figure></div>';
                    }else{
                        echo '<div class="col-md-4 profile-grid-image-container" data-index="'.$posts[$i]->Id.'"><div class="profile-grid-image" style="background-image: url('.$posts[$i]->Path.')"></div></div>';
                    }
                    


                endfor; endif;

            ?>
            </div>
            <div class="post-detail">
                <div class="picture"></div>
                <div class="info">
                    <div class="user">
                        <p class="username"></p>
                    </div>
                    <div class="likes">
                        <p class="likesCount"></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $("#follow").click(function () {
                $.ajax({
                    url: "../ajax/followProfile.php",
                    method:"POST",
                    data:{ userId: <?php echo $_GET['id'] ?> }
                }).done(function() {

                    $("#follow").hide();
                    $("#unfollow").show();
                });

            });

            $("#unfollow").click(function () {
                $.ajax({
                    url: "../ajax/unfollowProfile.php",
                    method:"POST",
                    data:{ userId: <?php echo $_GET['id'] ?> }
                }).done(function() {
                    //alert("het werkt");
                    $("#unfollow").hide();
                    $("#follow").show();
                });
            });

            $(".profile-grid-image-container").click(function () {
                var data = {
                    id: $(this).attr("data-index")
                }

                $.ajax({
                    url: "../ajax/showPostInfo.php",
                    method: "POST",
                    data: data
                }).done(function(res) {
                    var data = $.parseJSON(res);
                    $(".post-detail").css("display", "flex");
                    $(".post-detail .picture").css("background-image", "url("+data["path"]+")");
                    $(".post-detail .username").text(data["username"]);
                    $(".post-detail .likesCount").text(data["likes"]);
                });
            });

        </script>
        
</body>

</html>