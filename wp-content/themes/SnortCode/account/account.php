<?php
$current_user = wp_get_current_user();
?>

<?php
if ( isset($_GET['update']) && $_GET['update'] == 'success' ) { 
    echo 'Successfully Updated Your Account'; 
}
?>
<div class="inner-wrapper">
    <div id="edit-account">
        <label>Account #: <?php echo $current_user->user_login; ?></label>
        <label>First Name</label>
        <input type="text" value="<?php echo $current_user->first_name; ?>" id="edit-account-first">
        <label>Last Name</label>
        <input type="text" value="<?php echo $current_user->last_name; ?>" id="edit-account-last">
        <label>Email</label>
        <input type="text" value="<?php echo $current_user->user_email; ?>" id="edit-account-email">
        
        <label>Change My Password</label>
        <div class="custom-toggle" data-value="false" id="change-pass"></div>
        
        <div id="pass-container">
            <label>New Password<span>Minimum of 12 characters</span></label>
            <input type="password" value="" id="edit-account-newpass" autocomplete="new-password" >
            <label>Confirm New Password</label>
            <input type="password" value="" id="edit-account-newpass2">
        </div>

        <ul id="edit-account-messages"></ul>
        <a href="#" class="button-aqua" id="edit-account-submit">Update</a>
    </div>
</div>