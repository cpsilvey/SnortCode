<div class="inner-wrapper">

    <div id="my-codes">
        <?php
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        // Get Preferences //
        $view = get_field('my_codes_view', 'user_'.$current_user_id);

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
        $code_count = count($codes);
        ?>
        <h1>My Codes <span>(<?php echo $code_count; ?>/<?php echo get_code_max(); ?>)</span>
            <?php if (code_max_reached()) { ?> Upgrade to Unlock More Codes & Features! <?php } ?>
        </h1>
        <div id="my-codes-header" class="clearfix">
            <a href="<?php echo get_home_url(); ?>/my-codes/?action=create" class="button-aqua">Create New</a>
            <div id="code-search" class="clearfix">
                <input type="text" placeholder="Search Codes" />
            </div>
        </div>
        <div id="filter-sort" class="clearfix">
            <div id="filter-sort-view">
                    <div class="view-button <?php if($view == 'list') { ?> active <?php } ?>" id="view-list" data-value="list">
                        <svg id="view-list-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <rect width="512" height="73.14" rx="25.21" ry="25.21"/>
                            <rect y="292.57" width="512" height="73.14" rx="25.21" ry="25.21"/>
                            <rect y="438.86" width="512" height="73.14" rx="25.21" ry="25.21"/>
                            <rect y="146.29" width="512" height="73.14" rx="25.21" ry="25.21"/>
                        </svg>
                    </div>
                    <div class="view-button <?php if($view == 'grid') { ?> active <?php } ?>" id="view-grid" data-value="grid">
                        <svg id="view-grid-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <rect width="225.32" height="225.32" rx="30.51" ry="30.51"/>
                            <rect x="286.68" width="225.32" height="225.32" rx="30.51" ry="30.51"/>
                            <rect y="286.68" width="225.32" height="225.32" rx="30.51" ry="30.51"/>
                            <rect x="286.68" y="286.68" width="225.32" height="225.32" rx="30.51" ry="30.51"/>
                        </svg>
                    </div>
            </div>
        </div>
        <?php if ( $codes && count($codes) > 0 ) { ?>
        <ul class="clearfix <?php echo $view; ?>" id="code-list">
            <?php foreach ($codes as $code) {
                $name = get_field('name', $code->ID);
                $date = get_the_date('n/j/y', $code->ID);
                $scan_data = get_field('scan_data', $code->ID);
                $scan_count = is_array($scan_data) ? count($scan_data) : 0;
                $type = get_field('type', $code->ID);
                $url = get_field('url', $code->ID);
                ?>
                <li class="clearfix <?php echo $view; ?>" data-id="<?php echo $code->ID; ?>">
                    <a href="<?php echo get_home_url(); ?>/my-codes/?action=edit&id=<?php echo $code->ID; ?>"></a>
                    <div class="code-preview"></div>
                    <p class="code-name"><?php echo $name; ?><span>Created: <?php echo $date; ?></span></p>
                    <?php if ($type !== 'static') { ?>
                        <p class="code-scans">Scans<span><?php echo $scan_count; ?></span></p>
                    <?php } ?>
                    
                    <p class="code-type">Code Type: <span><?php echo $type; ?></span></p>
                    <p class="code-url">URL: <span><?php echo $url; ?></span></p>
                </li>
            <?php } ?>
        </ul>
        <?php } else { ?>
            <p>Looks like your code list is empty. Let's get started! <a href="<?php echo get_home_url(); ?>/my-codes/?action=create" class="button-aqua">Create Code</a></p>
        <?php } ?>
    </div>

</div>