<?php

    require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/session_handler.php');

    func_header(); 
?>

<!--  -->
<div class="container">

    <div id="" class="form-container">
        <h1>Login</h1>
        <form action="/login/login.php" method="post">
            <div class="form-field">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-input">
            </div>
            <div class="form-field">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            <div class="form-submit">
                <button type="submit" class="form-submit btn">Login</button>
            </div>
        </form>
    </div>
    
</div>

<!--  -->



<?php


func_footer();