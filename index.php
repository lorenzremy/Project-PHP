<?php
include 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Imdstagram</title>
    <link rel="stylesheet" href="css/style.css">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="javascript/showmore.js"></script>
</head>
<body>

<?php
    if(logged_in() === true){
        include 'imdstagram.php';
    } else {
        include 'loginwidget.php';
        
    }

?>
    
</body>
</html>   