<?php
    // Required Files
    require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/models/curl.php');

    // Create URL from $uri variables and submit to CURL::GET
    $url = "{$_SERVER['SERVER_NAME']}/api/post/show.php?id=" . $_GET['id'];
    $response = CURL::GET($url);

    // Header / Navbar 
    func_header(); 



    foreach ($response['data'] as $row) {
        echo "<div class='card'>";
            echo "<div>";
                echo "<h2>{$row['title']}</h2>";
                echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quae, quibusdam repudiandae molestiae accusamus pariatur adipisci magnam nihil, exercitationem nisi hic odio? Voluptas accusamus sunt eligendi quia esse asperiores perferendis.</p>";
            echo "</div>";
        echo "</div>";
    }

    func_footer();
?>





