
     
     
     
     <!-- ------------------ -->
<div class="header">
    <div class="innerheader">
        <a href="feed.php"><img id="instaheader" src="../images/Instagramlogo.png" alt="instagram logo"></a>
        <input type="text" name="search" class="input-search" placeholder="Search">
        <div class="dropdown">
            <button class="dropbtn"><img id="usericon" src="../images/user.png" alt="user icon"></button>
            <div class="dropdown-content">
                <a href="feed.php">Feed</a>
                <a href="upload.php">Upload</a>
                <a href="profile.php?id=<?php echo $_SESSION['user']; ?>">My account</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

     <!-- JAVASCRIPT AND JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="../js/search.js"></script>
    
</nav>