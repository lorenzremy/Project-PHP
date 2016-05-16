
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
			$query = mysqli_query($con, "SELECT * FROM tutorials ORDER BY id DESC LIMIT 2");
			
			//number of rows
			$rowCount = pdo_num_rows($query);
			
			if($rowCount > 0){ 
				while($row = mysqli_fetch_assoc($query)){ 
                    $tutorial_id = 	$row['id'];
            ?>
           	 	<div class="list_item">
           	 	    <a href="javascript:void(0);"><h2><?php echo $row['title']; ?></h2></a>
                    <img src="<?php echo $row['imglocation']; ?>" alt="afbeelding"/>
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
    

