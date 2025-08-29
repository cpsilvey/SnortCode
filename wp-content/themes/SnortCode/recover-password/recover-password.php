<?php if ( is_user_logged_in() ) { ?>
    <script>
        window.location.href = "<?php echo esc_url( home_url( '/' ) ); ?>";
    </script>
<?php } ?>

<?php
// Default view = request reset form
$show_request_form = true;
$show_reset_form   = false;

// Check if URL has token + userid
$user_id = isset($_GET['userid']) ? intval($_GET['userid']) : 0;
$token   = isset($_GET['token']) ? sanitize_text_field($_GET['token']) : '';


if ($user_id && $token) {
    // Try to load stored values
    $stored_token = get_field('password_recover_token', 'user_'.$user_id);
    
    $expires = get_field('password_recover_expiration', 'user_'.$user_id);

    if ($stored_token && hash_equals($stored_token, $token) && time() < $expires) {
        // Valid link -> show reset password form
        $show_request_form = false;
        $show_reset_form   = true;
    } else {
        $error = 'This reset link is invalid or expired. Please request a new one.';
    }
}
?>

<?php if ($show_request_form) { ?>
    <?php if ($error) { ?>
        <div class="inner-wrapper">
            <h2 style="margin:30px 0; text-align:center;"><?php echo $error;?></h2>
        </div>
    <?php } ?>
    <!-- Password Recovery Request Form -->
    <div id="recover-password" class="card">
        <h2>Enter Your Email or Account #</h2>
        <label>Enter either your email address or account number and we will email you a reset link.</label>
        <input type="text" value="" id="recover-password-username" />
        <ul id="recover-password-messages"></ul>
        <a href="#" class="button-aqua" id="recover-password-submit">Submit</a>
    </div>
<?php } ?>

<?php if ($show_reset_form) { ?>
    <!-- Password Reset Form -->
    <div id="reset-password" class="card">
        <h2>Create Your New Password</h2>
        <label>New Password<span>Minimum of 12 characters</span></label>
        <input type="password" id="reset-password-newpass" />
        <label>Confirm New Password</label>
        <input type="password" id="reset-password-newpass2" />
        <ul id="reset-password-messages"></ul>
        <a href="#" class="button-aqua" id="reset-password-submit" data-id="<?php echo $user_id; ?>">Submit</a>
    </div>
    
<?php } ?>

