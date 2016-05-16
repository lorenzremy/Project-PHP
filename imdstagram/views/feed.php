<?php
      
    session_start();

    if(empty($_SESSION['user']))
    {
        header("Location: index.php");
    }
    else
    {
        spl_autoload_register(function ($class) {
            include_once '../classes/' . $class . '.class.php';
        });   
        
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>IMDstagram</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssgram.min.css" rel="stylesheet">
    </head>

    <body>
       
        <?php include_once("header.php"); ?>
        
        <div class="container">
<?php

                $posts = $user->loadFeed();

                if(count($posts) == 0):
                    echo "<p>There are no posts at this moment</p>";
                else: 

                for($i = 0; $i < count($posts); $i++):
                    $filter = $posts[$i]->Filter;
                    if(!empty($filter)){
                        echo '<div class="id" data-index="'.$posts[$i]->Id.'"><figure class="'.$filter.'"><div class="profile-picture" style="background-image: url('.$posts[$i]->Path.')"></div></figure></div>';
                    }else{
                        echo '<div class="id" data-index="'.$posts[$i]->Id.'"><div class="profile-picture" style="background-image: url('.$posts[$i]->Path.')"></div></div>';
                    }
                    


                endfor; endif;

            ?>
                        
            <div class="show_more_main" id="show_more_main">
                <span data-index="<?php echo $id; ?>" class="show_more" title="Load more posts">LOADING MORE POSTS</span>
            </div>

        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
        <script src="../js/script.js"></script>
            
    </body>
</html>