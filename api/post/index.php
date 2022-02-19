<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Tyoe: application/json');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Post.php');

    // Get Variables from $_GET and add to $vars Array
    $vars = array();
    $author = isset($_GET['author']) ? $vars['author'] = $_GET['author'] : null;
    $page = isset($_GET['page']) ? $vars['page'] = ($_GET['page']  - 1 ) : null;
    $genre = isset($_GET['category']) ? $vars['genre'] = $_GET['category'] : null;
    $year = isset($_GET['year']) ? $vars['year'] = $_GET['year'] : null;

    // POST::index() to query database and return results
    $result = Post::index($vars);
    echo $result;


