<?php
include 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Imdstagram</title>
    <link rel="stylesheet" href="css/style.css">
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