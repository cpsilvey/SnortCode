<div class="inner-wrapper">

    <div id="my-codes">
        <?php
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;

        $args = array(
            'post_type'   => 'codes',
            'meta_query'     => array(
                array(
                    'key'   => 'owner_id',             // name of your custom field
                    'value' => $current_user->ID,      // match current user's ID
                    'compare' => '='
                )
            ),
            'posts_per_page' => -1, 
        );

        $codes = get_posts($args);
        ?>
        <h1>My Codes (count)</h1>
        <a href="<?php echo get_home_url(); ?>/my-codes/?action=create" class="button-aqua">Create New</a>
        <div id="code-search" class="clearfix">
            <input type="text" placeholder="Search Codes" />
        </div>
        <?php if ( $codes && count($codes) > 0 ) { ?>
        <ul class="clearfix">
            <?php foreach ($codes as $code) {
                $name = get_field('name', $code->ID);
                $date = get_the_date('n/j/y', $code->ID);
                $scan_data = get_field('scan_data', $code->ID);
                $scan_count = is_array($scan_data) ? count($scan_data) : 0;
                $type = get_field('type', $code->ID);
                if ($type == 'redirect') {
                    $type = 'URL';
                }
                $redirect = get_field('redirect', $code->ID);
                ?>
                <li class="clearfix" data-id="<?php echo $code->ID; ?>">
                    <a href="<?php echo get_home_url(); ?>/my-codes/?action=edit&id=<?php echo $code->ID; ?>"></a>
                    <div class="code-preview"></div>
                    <p class="code-name"><?php echo $name; ?><span>Created: <?php echo $date; ?></span></p>
                    <p class="code-scans">Scans<span><?php echo $scan_count; ?></span></p>
                    <p class="code-type">Code Type: <?php echo $type; ?><span>(<?php echo $redirect; ?>)</span></p>
                </li>
            <?php } ?>
        </ul>
        <?php } else { ?>
            <p>Looks like your code list is empty. Let's get started! <a href="<?php echo get_home_url(); ?>/my-codes/?action=create" class="button-aqua">Create Code</a></p>
        <?php } ?>
    </div>

</div>