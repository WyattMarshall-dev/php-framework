<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Post.php');

if (isset($_GET)){
    var_dump($_GET);
    $result = Post::destroy($_GET['id']);
    header("Location: http://{$_SERVER['DOCUMENT_ROOT']}/index.php");  
} else {
    echo "Nothing in _POST yet";
}




?>