<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/images.php');

if (isset($_POST)){

    if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]['size'] > 1){
        $file = basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "{$_SERVER['DOCUMENT_ROOT']}/uploads/{$file}");
        $image = "{$_SERVER['DOCUMENT_ROOT']}/uploads/{$file}";
        $im = imagecreatefromjpeg($image);

        resize_image($im, $image, $file);
        
    } else if(isset($_POST['currentFile'])){
        $file = $_POST['currentFile'];
    } else {
        $file = null;
    }    

    $result = Post::edit(
        $_POST['id'],
        $_POST['isbn'],
        $_POST['author'],
        $_POST['title'],
        $_POST['pub_year'],
        $_POST['genre'],
        $file
    );
    header("Location: http://{$_SERVER['DOCUMENT_ROOT']}/index.php");  
} else {
    echo "Nothing in _POST yet";
}




?>