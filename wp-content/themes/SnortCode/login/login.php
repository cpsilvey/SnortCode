<?php

if ( is_user_logged_in() ) {
   echo 'already logged in';
} else { ?>
    <?php 
    if ( isset($_GET['logout']) && $_GET['logout'] == 'success' ) { 
        echo 'Successfully Logged Out'; 
    } 
    ?>
    <div id="login">
        <label>Username or Email</label>
        <input type="text" id="login-username" />
        <label>Password</label>
        <input type="password" id="login-pass" />
        <a href="#" class="button-aqua" id="login-submit">Login</a>
        <p id="login-form-message"></p>
    </div>

    <p>Don't have an account? <a href="<?php echo get_home_url(); ?>/create-account" class="button-aqua">Create Account</a></p>
    </h3>
<?php } ?>

