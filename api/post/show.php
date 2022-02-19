<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Tyoe: application/json');

    require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Post.php');
    
    $post_id = $_GET['id'];

    $result = Post::show($post_id);
    echo $result;    