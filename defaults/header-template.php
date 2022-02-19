<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/includes/styles.css">
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php'); ?>
    <script src="/includes/script.js" defer></script>


</head>
<body>
    <header>
        <nav id="main-nav">
            <div id="logo">
                <a href="/"><h1>LOGO</h1></a>
            </div>

            <div id="link-div">
                <div id="main-nav-links">

                    <div class="nav-link-div">
                        <a href="/" class="<?php if($_SERVER['PHP_SELF'] == '/index.php') echo ' active ' ?> nav-link">Home</a>
                    </div>
                    <div class="nav-link-div">
                        <?php if($_SESSION['user'] == 'guest'){ ?>
                            <a href="/login.php" class="<?php if($_SERVER['PHP_SELF'] == '/login.php') echo ' active ' ?> nav-link">Login</a>
                        <?php } ?>
                    </div>

                    <div id="one" class="dropdown nav-link-div">
                        <span class="dropbtn btn nav-link" onclick="dropTrigger(this)" >Drop Menu &#8628</span>
                        <div class="dropdown-content one">
                            <a href="/blog.php">Blog</a>
                            <a href="/">Link 2</a>
                            <a href="/">Link 3</a>
                        </div>
                    </div>

                    <div id="two" class="dropdown nav-link-div">
                        <span class="dropbtn btn nav-link" onclick="dropTrigger(this)" >Dropdown &#8628</span>
                        <div class="dropdown-content two">
                            <a href="/">Home</a>
                            <a href="/">About</a>
                            <a href="/">Contact</a>
                        </div>
                    </div>

                    <?php if($_SESSION['loggedin']){ ?>
                    <div id="one" class="dropdown nav-link-div">
                        <span class="dropbtn btn nav-link" onclick="dropTrigger(this)" >Admin &#8628</span>
                        <div class="dropdown-content one">
                            <a href="/logout.php" class="">Logout</a>
                            <a href="/" class="">Create Post</a>
                        </div>
                    </div>
                    <?php } ?>


                </div>
            </div>

            <div class="burger" onclick="burgerfunc()">
                <div>&#9776</div>
            </div>
        </nav>
    </header>
    <div id="main-content" class="">


   