<?php if ( is_user_logged_in() ) { ?>
    <script>
        window.location.href = "<?php echo esc_url( get_home_url() ); ?>";
    </script>
<?php } ?>

<div id="login-banner">
    <div id="login" class="card">
        <?php if ( isset($_GET['logout']) && $_GET['logout'] == 'success' ) { ?>
            <h2>You have successfully logged out</h2>
        <?php } else if ( isset($_GET['password']) && $_GET['password'] == 'reset' ) { ?>
            <h2>Success! <br />Your password was updated. You can now log in.</h2>
        <?php } else { ?>
            <h2>Login to your account</h2>
        <?php } ?>
        <label>Email or Account Number</label>
        <input type="text" id="login-username" />
        <label>Password</label>
        <input type="password" id="login-pass" />
        <a href="#" class="button-aqua" id="login-submit">Login</a>
        <ul id="login-form-messages"></ul>

        <div id="login-create">
            <h2>Don't have an account?</h2>
            <a href="<?php echo get_home_url(); ?>/create-account" class="button-gray">Create Account</a>
        </div>

        <div id="login-helper">
            <a href="<?php echo get_home_url(); ?>/recover-password">I forgot my password :(</a>
        </div>
    </div>
</div>
