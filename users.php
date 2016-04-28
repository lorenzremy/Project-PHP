<?php
function logged_in(){
    return (isset($_SESSION['users_id'])) ? true : false;
}

function register_user($register_data){
    array_walk($register_data, 'array_sanitize');
    $register_data['password'] = md5($register_data['password']);
    $fields ='`' . implode('`, `', array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'', $register_data) . '\'';
    
    
    mysql_query("INSERT INTO users ($fields) VALUES ($data)");
}

function user_exists($username){
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(users_id) FROM users WHERE username = '$username'");
    return mysql_result($query, 0) == 1 ? true : false;
}

function email_exists($email){
    $email = sanitize($email);
    $query = mysql_query("SELECT COUNT(users_id) FROM users WHERE email = '$email'");
    return mysql_result($query, 0) == 1 ? true : false;
}

function users_id_from_username($username){
    $username = sanitize($username);
    return mysql_result(mysql_query("SELECT users_id FROM users WHERE username ='$username'"), 0, 'users_id');
}

function login($username, $password){
    $users_id = users_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password);
    
    return (mysql_result(mysql_query("SELECT COUNT(users_id) FROM users WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $users_id : false;
    
}
?>