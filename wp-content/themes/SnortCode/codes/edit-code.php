<?php
$code_id = get_the_id();
$code_name = get_field('name', $code_id);
$code_url = get_field('redirect', $code_id);
?>

<div id="edit-code" class="clearfix">
    <h1>Edit Code</h1>
    <div id="edit-code-form">
        <label>Name</label>
        <input type=text" value="<?php echo $code_name; ?>" id="code-name" />
        <div class="custom-toggle" id="code-active" data-value="false"><span class="off">Off</span><span class="on">On</span></div>
        <label>Code Type</label>
        <p class="instructions">Please select the behavior of the qr code.</p>
        <div class="custom-select" id="code-type">
            <div class="custom-select-value">- Select -</div>
            <ul class="custom-select-menu">
                <li data-value="static">Static URL</li>
                <li data-value="dynamic">Dynamic URL</li>
                <li data-value="vcard">vCard</li>
            </ul>
        </div>

        <label>URL</label>
        <p class="instructions">This code is dynamic. When scanned it will lead to the url below.</p>
        <input type=text" value="<?php echo $code_url; ?>" id="code-url" />
    </div>
    <div id="edit-code-preview">
        Preview
    </div>
</div>