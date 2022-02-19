<?php

    // Required Files
    require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/models/curl.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session_handler.php');

    // Header / Navbar 
    func_header(); 

    // Create URL from $uri variables and submit to CURL::GET
    $url = "{$_SERVER['SERVER_NAME']}/api/post/index.php?" . http_build_query($uri);
    $response = CURL::GET($url);
?>

<!-- Main Content Section -->

<div id="blog" class="container">
    
<?php
if(isset($_GET['category'])){
    echo "<h1>Category : {$_GET['category']}</h1>";
}
?>
        <div id='blog-div' class="grid">

            <?php

                foreach ($response['data'] as $row) {

                    echo "<div class='card'>";
                        echo "<div>";
                        echo "<h2><a href='/show.php?id=" . $row['id'] . "'>{$row['title']}</a></h2>";
                        echo "<p>Category: <a href='/blog.php?category=" . $row['genre'] . "'>{$row['genre']}</a></p>";
                        echo "<p>Posted: " . date('m.d.Y', strtotime($row['created_at']) ) . "</p>";
                        echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quae, quibusdam repudiandae molestiae accusamus pariatur adipisci magnam nihil, exercitationem nisi hic odio? Voluptas accusamus sunt eligendi quia esse asperiores perferendis.</p>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>

            </div>
</div>

<?php 

    $pages = $response['information']['pageCount'];
    unset($_GET['page']);
    $currentUrl = http_build_query($_GET);

    echo "<div id='pageLinks' class='container'>";
        for ($i=1; $i < ($pages + 1); $i++) { 
            echo "<a href='/blog.php?{$currentUrl}&page={$i}' style='padding: 0px 5px;'>{$i}</a>";
        }
    echo "</div>";

?>

<!-- End Main Content Section -->

<?php
func_footer();