<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session_handler.php');

$username = 'wyatt';
$password = 'password';

if($_POST['username'] == $username && $_POST['password'] == $password){
    echo "<hr>Logged IN <hr>";
    session_start();
    $_SESSION['user'] = $username;
    $_SESSION['loggedin'] = true;
    header('Location: http://' . $_SERVER['SERVER_NAME']);
}

var_dump($_POST);
var_dump($_SESSION);