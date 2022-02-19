<?php

// Display Header for Document
function func_header(){

    if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/header.php")){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php");
    } else {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/defaults/header-template.php");
    }
}

// Display Footer for Document
function func_footer() {
    if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/footer.php")){
        include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");
    } else {
        include($_SERVER['DOCUMENT_ROOT'] . "/defaults/footer-template.php");
    }
}

// Active Link in navbar
function active_link($url){
    if($_SERVER['PHP_SELF'] == $url){
        echo " active ";
    }
}


