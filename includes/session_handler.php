<?php

    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = 'guest';
    }


    // SETUP URI and year variables to be used in http_build_query()
    // --------------------------------------------
    $uri = array();
    $year = '';

    
    // Check if variables are set
    // If not set, Set to empty strings
    // Else push to $URI with as Key=>Value pair
    // ---------------------------------------------
    if(isset($_GET['author']) && $_GET['author'] != null){
        $uri['author'] = $_GET['author'];
    }
    if(isset($_GET['category']) && $_GET['category'] != null){
        $uri['category'] = $_GET['category'];
    }
    if (isset($_GET['year']) && (count($_GET['year']) > 1)) {
        $uri['year'] = array($_GET['year'][0], end($_GET['year']));
        $year = $uri['year'];
    }
    if(isset($_GET['page']) && $_GET['page'] != null){
        $uri['page'] = $_GET['page'];
    }