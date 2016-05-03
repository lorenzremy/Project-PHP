<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Imdstagram</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="javascript/showmore.js"></script>

</head>
<body>
<div class="header">
<div class="innerheader">
<img id="instaheader" src="images/Instagramlogo.png" alt="instagram logo">
<div class="dropdown">
  <button class="dropbtn"><img id="usericon" src="images/user.png" alt="user icon"></button>
  <div class="dropdown-content">
    <a href="#">Volgers</a>
    <a href="#">Instellingen</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
</div>
</div>

<body>
   
   <?php
//include database configuration file
include('db_config.php');
?>
    
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        	<h1>What's new</h1>
            <div class="tutorial_list">
			<?php
			//get rows query
			$query = mysqli_query($con, "SELECT * FROM tutorials ORDER BY created DESC LIMIT 2");
			
			//number of rows
			$rowCount = mysqli_num_rows($query);
			
			if($rowCount > 0){ 
				while($row = mysqli_fetch_assoc($query)){ 
                    $tutorial_id = 	$row['id'];
            ?>
           	 	<div class="list_item">
           	 	    <a href="javascript:void(0);"><h2><?php echo $row['title']; ?></h2></a>
                    <p><?php echo $row[imglocation]; ?></p>
           	 	</div>
            <?php } ?>
            <div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
                <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Load more posts">Show more</span>
                <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
    
</div>
    
</body>
</body>
</html>  