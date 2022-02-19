<?php
    // Required Files
    require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/models/curl.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session_handler.php');

    $backgroundImg = '/assets/pexels-cátia-matos-1072179.jpg';

    // Create URL from $uri variables and submit to CURL::GET
    $url = "{$_SERVER['SERVER_NAME']}/api/post/index.php?" . http_build_query($uri);

    $response = CURL::GET($url);

    // logged in panel
    // echo $_SESSION['loggedin'] ?  "IN" :  "OUT";

    // Header / Navbar 
    func_header(); 
?>

<!-- Main Content Section -->
<div id="hero" class="" style="background-image: url(<?php echo $backgroundImg; ?>);">

        <!-- <img src="/assets/pexels-cátia-matos-1072179.jpg" id="hero-img" alt="Hero-Banner" > -->
        <div id="hero-content">
            <div>
                <h1>Welcome</h1>
                <hr class="mb-2">
            </div>
            <span class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea repellat facilis dolorem, quibusdam dolore cumque explicabo reiciendis, consectetur inventore similique consequuntur beatae eos. Nulla eveniet doloremque quam at doloribus neque!</span>
            <button class="btn btn-blue">Click Here</button>
        </div>

</div>

<div id="section-1" class="container">
    
        <div class="grid">

            <?php

                foreach ($response['data'] as $row) {
                    echo "<div class='card'>";
                        echo "<div>";
                            echo "<h2><a href='/show.php?id=" . $row['id'] . "'>{$row['title']}</a></h2>";
                            echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quae, quibusdam repudiandae molestiae accusamus pariatur adipisci magnam nihil, exercitationem nisi hic odio? Voluptas accusamus sunt eligendi quia esse asperiores perferendis.</p>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>

        </div>

        <div id="sub-grid">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed dolorem aspernatur, molestias hic dicta totam! Porro qui, omnis nemo, quidem, deleniti ullam ut quam ea dolorem corporis dignissimos exercitationem commodi?</p>
        </div>

</div>

<!-- End Main Content Section -->

<?php
func_footer();