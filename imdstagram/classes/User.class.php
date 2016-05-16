<?php

    include_once("Photo.class.php");

    class User
	{
        private $m_iId;
        private $m_sUsername;
		private $m_sFirstname;
        private $m_sLastname;
		private $m_sEmail;
		private $m_sPassword;
        private $m_bPrivate;
        private $m_aErrors;
        private $m_sConfirm_password;
        private $m_sAvatar;
        private $m_iPhotosNr;
        private $m_iFollowersNr;
        private $m_iFollowingNr;

        public function __set( $p_sProperty, $p_vValue )
        {
            switch($p_sProperty)
            {

                case 'Id':
                    $this->m_iId = $p_vValue;
                break;
                    
                case "Firstname":
                    if(!empty($p_vValue))
                    {
                        $this->m_sFirstname = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Voornaam mag niet leeg zijn!");
                    }
                break;
                case 'Lastname':
                    if(!empty($p_vValue))
                    {
                        $this->m_sLastname = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Achternaam mag niet leeg zijn!");
                    }
                break;
                case 'Username':
                    if(!empty($p_vValue))
                    {
                        $this->m_sUsername = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Gebruikersnaam mag niet leeg zijn!");
                    }
                break;
                case 'Email':
                    if(!empty($p_vValue))
                    {
                        $this->m_sEmail = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Het emailveld mag niet leeg zijn!");
                    }
                break;
                case 'Password':
                    if(!empty($p_vValue))
                    {
                        $this->m_sPassword = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("Paswoord mag niet leeg zijn!");
                    }
                break;
                case 'ConfirmPassword':
                    if(!empty($p_vValue))
                    {
                        $this->m_sConfirm_password = $p_vValue;
                    }
                    else
                    {
                        throw new Exception("paswoord mag niet leeg zijn!");
                    }
				break;
                case 'Avatar':
                    $this->m_sAvatar = $p_vValue;
                break;
                case 'PhotosNr':
                    $this->m_iPhotosNr = $p_vValue;
                break;
                case 'FollowingNr':
                    $this->m_iFollowingNr = $p_vValue;
                break;
                case 'FollowersNr':
                    $this->m_iFollowersNr = $p_vValue;
                break;
                case 'Private':
                    $this->m_bPrivate = $p_vValue;
                break;
				default: echo("Not existing property: " . $p_sProperty);
            } 
        }

        public function __get($p_sProperty)
        {
            switch($p_sProperty)
            {
                case 'Id':
                    return($this->m_iId);
                break;
                case 'Firstname':
                    return($this->m_sFirstname);
                break;
                case 'Lastname':
                    return($this->m_sLastname);
                break;
                case 'Username':
                    return($this->m_sUsername);
                break;
                case 'Email':
                    return($this->m_sEmail);
                break;
                case 'Password':
                    return($this->m_sPassword);
                break;
                case 'Private':
                    return($this->m_bPrivate);
                break;
                case 'Errors':
                    return($this->m_aErrors);
                break;
                case 'Avatar':
                    return($this->m_sAvatar);
                break;
                case 'PhotosNr':
                    return($this->m_iPhotosNr);
                break;
                case 'FollowersNr':
                    return($this->m_iFollowersNr);
                break;
                case 'FollowingNr':
                    return($this->m_iFollowingNr);
                break;
                case 'ConfirmPassword':
                    return($this->m_sConfirm_password);
                break; 
                default: echo("Not existing property: " . $p_sProperty);
            }
        }

		public function register()
        {
            if($this->m_sPassword != $this->m_sConfirm_password || !$this->checkEmail())
            {
                throw new Exception("Please fill in all fields and two correct passwords");
            } 
            else
            {
                $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $hashedPw = password_hash($this->m_sPassword, PASSWORD_DEFAULT);

                $data = $conn->query("INSERT INTO users(firstname, lastname, username, email, password) VALUES(" . $conn->quote($this->m_sFirstname) . ", ". $conn->quote($this->m_sLastname) .",". $conn->quote($this->m_sUsername) .",". $conn->quote($this->m_sEmail) .",". $conn->quote($hashedPw) .")");
                header("Location: index.php");
            }
		}
        
        function checkEmail()
        {
            $email = $this->m_sEmail;
            
            $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = $conn->query("SELECT email FROM users WHERE email = '". $email ."'");
                
            $count = $query->rowCount();
        
            if($count == 0)
            {
                return true;
            }
            else
            {
                throw new Exception("The email you entered is already in use");
                return false;
            }
        }
        
        public function canLogin($p_sEmail, $p_sPassword)
        {
            if (!empty($p_sEmail) && !empty($p_sPassword))
            {
                $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
                $query = $conn->prepare('SELECT * FROM users WHERE email = :email');
                $query->bindParam(':email', $p_sEmail);
                $query->execute();
                $result = $query -> fetch(PDO::FETCH_ASSOC);
                //var_dump($result);

                if (password_verify($p_sPassword, $result['password']))
                {
                    $_SESSION['user'] = $result['id'];

                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        function getDataFromDatabase()
        {
            $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data = $conn->query("SELECT * FROM users WHERE id = '".$this->Id."'"); 
            
            foreach ($data as $row) {
                
                $this->Firstname = $row['firstname'];
                $this->Lastname = $row['lastname'];
                $this->Username = $row['username'];
                $this->Email = $row['email'];
                $this->Private = $row['privateAccount'];
                $this->Avatar = $row['profilePicture'];

                $query = $conn->query("SELECT * FROM posts WHERE userId = '".$this->Id."'"); 
                $count = $query->rowCount();
                $this->PhotosNr = $count;

                $query = $conn->query("SELECT * FROM users_followers WHERE followUserId = '".$this->Id."'"); 
                $count = $query->rowCount();
                $this->FollowersNr = $count;

                $query = $conn->query("SELECT * FROM users_followers WHERE userId = '".$this->Id."'"); 
                $count = $query->rowCount();
                $this->FollowingNr = $count;

                
            } 
        }

        public function checkInDatabase($column, $data){
            $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data = $conn->query("SELECT ".$column." FROM users"); 

            $result = $data->fetch(PDO::FETCH_NUM);

            if(in_array($data, $result)){
                return false;
            }else{
                return true;
            }
        }

        // Show errors in a HTML list
        public function showFeedback(){

            if(count($this->Errors) > 0){
                $output = '<div class="alert alert-danger" role="alert"><p>There were some errors while changing your account information:</p><ul>';

                for($i = 0; $i < count($this->Errors); $i++){
                    $output .= "<li>".$this->Errors[$i]."</li>";
                }

                $output .= "</ul></div>";

                
            }else{
                
                $output = '<div class="alert alert-success" role="alert">Your changes are successfully saved.</div>';

            }

            return $output;

        }
        
        
        public function changeProfile($user, $email, $firstname, $lastname, $username, $private, $picture)
        {
            if($this->Email !== $email){
                if(!empty($email)){
                    if($this->checkInDatabase("email", $email)){
                        $this->Email = $email;
                    }else{
                        $this->Errors = "Undefined error";
                    }
                }else{
                    $this->Errors = "Please fill in your email.";
                }
            }

            if(empty($firstname)){
                $this->Errors = "Please fill in your firstname.";
            }else{
                $this->Firstname = $firstname;
            }

            if(empty($lastname)){
                $this->Errors = "Please fill in your lastname.";
            }else{
                $this->Lastname = $lastname;
            }

            if($username !== $this->Username){
                if(empty($username)){
                    $this->Errors = "Please fill in your username.";
                }else{
                    if(!$this->checkInDatabase("username", $username)){
                        if(strlen($username) < 4){
                            $this->Errors = "Your username must be at least 4 characters long.";
                        }else{
                            $this->Username = $username;
                        }
                    }else{
                        //TODO: REALTIME CHECK WITH AJAX
                        $this->Errors = "The username '".$username."' is already taken.";
                    }
                }
            }


            if($private == "on"){
                $this->Private = 1;
            }else{
                $this->Private = 0;
            }
            
            if(!empty($picture)){
                $profilePicturePath = "../public/users/" . $this->Id . ".png";

                if ($picture["size"] > 500000) {
                    $this->Errors = "The size of your profile picture is too big. The maximum file size is 50MB.";
                }else{
                    //TODO: MODIFY IF SO THERE IS NO EMPTY IF STATEMENT
                    if (move_uploaded_file($picture["tmp_name"], $profilePicturePath)) {

                    } 
                }
            }


            if(count($this->Errors) == 0){

                //TODO: Change query to $this->PROPERTY
                $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $data = $conn->query("UPDATE users SET email='".$email."',  firstname='".$firstname."', lastname='".$lastname."', username='".$username."', privateAccount='".$this->Private."', profilePicture='".$profilePicturePath."' WHERE id='".$user."'"); 
            
            } 

        }

        function loadFeed(){

            $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $posts = $conn->query("SELECT * FROM posts ORDER BY id DESC");

            $rowCount = $posts->rowCount();
                    
            while($row = $posts->fetch(PDO::FETCH_ASSOC))
            { 

            $photo = new Photo();
            $photo->Path = $row['picturePath'];
                

                //Change hashtags to links
                $strlen = strlen($row['description']);
                $description = "";
                $tag = false;
                for( $i = 0; $i <= $strlen; $i++ ) {
                    $char = substr( $row['description'], $i, 1 );

                    if($char == "#"){
                        $tag = true;
                        $tagname = "";
                    }else{
                        if($tag == true){

                            if($char == " " || $char == ""){

                                $description .= '<a href="search.php?q='.$tagname.'">#'.$tagname.'</a>';
                                $tag = false;
                                $tagname = "";

                            }else{
                                $tagname .= $char;
                            }
                        }else{
                            $description .= $char;
                        }
                    }
                }

                $photo->Description = $description;
                $photo->User = $row['userId'];
                $photo->Id = $row['id'];


                // Calculate how many days ago posted
                $now = time(); 
                $date = strtotime($row['date']);
                $datediff = $now - $date;
                $days = floor($datediff/(60*60*24));

                if($days == 0){
                    $daysPosted = "Today";
                }else{
                    if($days == 1){
                        $daysPosted = "Yesterday";
                    }else{
                        $daysPosted = $days . " days ago";
                    }
                } 

                $photo->Date = $daysPosted;

                // Check if the current post is already liked by the user
                $like = $conn->query("SELECT * FROM posts_likes WHERE postId = '".$photo->Id."' AND userId = '".$_SESSION['user']."'" );
                if($like->rowCount() == 0){
                    $photo->Liked = false;
                }else{
                    $photo->Liked = true;
                }

                // Count all the likes of this post
                $allLikes = $conn->query("SELECT * FROM posts_likes WHERE postId = '".$this->Id."'" );
                $photo->LikesCount = $allLikes->rowCount();

                 if(!empty($row['location'])){
                    
                    $photo->getLocation();

                }

                 $photo->Filter = $row['filter'];

                $data[] = $photo;
            }

            if(!empty($data)){
                return $data;
            }
        }

        public function loadProfile()
        {

            $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $posts = $conn->query("SELECT * FROM posts WHERE userId = " . $this->Id . " ORDER BY id DESC");

            $rowCount = $posts->rowCount();
                    
            while($row = $posts->fetch(PDO::FETCH_ASSOC))
            { 

            $photo = new Photo();
            $photo->Path = $row['picturePath'];
                

                //Change hashtags to links
                $strlen = strlen($row['description']);
                $description = "";
                $tag = false;
                for( $i = 0; $i <= $strlen; $i++ ) {
                    $char = substr( $row['description'], $i, 1 );

                    if($char == "#"){
                        $tag = true;
                        $tagname = "";
                    }else{
                        if($tag == true){

                            if($char == " " || $char == ""){

                                $description .= '<a href="search.php?q='.$tagname.'">#'.$tagname.'</a>';
                                $tag = false;
                                $tagname = "";

                            }else{
                                $tagname .= $char;
                            }
                        }else{
                            $description .= $char;
                        }
                    }
                }

                $photo->Description = $description;
                $photo->User = $row['userId'];
                $photo->Id = $row['id'];

                $allLikes = $conn->query("SELECT * FROM posts_likes WHERE postId = '".$this->Id."'" );
                $photo->LikesCount = $allLikes->rowCount();

                 if(!empty($row['location'])){
                    
                    $photo->getLocation();

                }

                 $photo->Filter = $row['filter'];

                $data[] = $photo;
            }

            if(!empty($data)){
                return $data;
            }
            
        }

        public function deleteAccount(){

            $conn = new PDO('mysql:host=localhost;dbname=phpproject', "root", "");
            
            $statement = $conn->prepare("DELETE FROM users WHERE id = ?");
            $statement->execute(array($this->Id));
            session_destroy();
            header("Location: index.php");
        }

        public function checkFollow()
        {
            $db = new Db();
            $conn = $db->connect();
            $followed = $conn->query("SELECT COUNT(*) As count FROM users_followers WHERE userId = ".$_SESSION['user']." AND followUserId = ".$this->Id);
            $result= $followed->fetch(PDO::FETCH_ASSOC);
            if($result['count'] == 0){
               return true;
            }elseif($result['count'] == 1){
                return false;
                echo '<input id="unfollow" name="following" type="submit" value="following">';
                echo'<input id="follow" name="follow" type="submit" value="follow" style="display: none">';
            }
        }

        public function checkIfUserExists(){
            $db = new Db();
            $conn = $db->connect();
            $data = $conn->query("SELECT * FROM users WHERE id = ". $this->Id);
            if($data->rowCount() == 0){
                return false;
            }else{
                return true;
            }
        }
}
?>