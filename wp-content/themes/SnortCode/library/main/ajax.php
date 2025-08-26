<?php
add_action('wp_head', 'blankie_ajaxurl');

function blankie_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
