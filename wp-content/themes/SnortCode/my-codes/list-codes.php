<div id="my-codes">
    <?php
    $args = array(
        'post_type'      => 'codes',
        'posts_per_page' => -1,                      
        'post_status'    => 'publish'
    );

    $codes = get_posts($args);
    ?>
    <h1>My Codes (<?php echo count($codes); ?>)</h1>
    <a href="<?php echo get_home_url(); ?>/my-codes/?action=create">Create New</a>
    <div id="code-search" class="clearfix">
        <input type="text" placeholder="Search Codes" />
    </div>
    <ul class="clearfix">
        <?php foreach ($codes as $code) {
            $name = get_field('name', $code->ID);
            $date = get_the_date('n/j/y', $code->ID);
            $scan_count = count(get_field('scan_data', $code->ID));
            $type = get_field('type', $code->ID);
            if ($type == 'redirect') {
                $type = 'URL';
            }
            $redirect = get_field('redirect', $code->ID);
            ?>
            <li class="clearfix" data-id="<?php echo $code->ID; ?>">
                <a href="<?php echo get_the_permalink($code->ID); ?>/?action=edit"></a>
                <div class="code-preview"></div>
                <p class="code-name"><?php echo $name; ?><span>Created: <?php echo $date; ?></span></p>
                <p class="code-scans">Scans<span><?php echo $scan_count; ?></span></p>
                <p class="code-type">Code Type: <?php echo $type; ?><span>(<?php echo $redirect; ?>)</span></p>
            </li>
        <?php } ?>
    </ul>
</div>