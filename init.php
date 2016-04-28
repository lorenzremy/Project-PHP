<?php
    session_start();

    mysql_connect('localhost', 'root', '');
    mysql_select_db('imdstagram');

    require 'users.php';
    require 'general.php';

    $errors = array();
?>