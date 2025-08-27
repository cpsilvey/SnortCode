<div id="create-code" class="clearfix">
    <h1>Create New Code</h1>
    <div id="create-code-form">
        <label>Name</label>
        <input type="text" value="<?php echo $code_name; ?>" id="code-name" />
        <!-- <div class="custom-toggle" id="code-active" data-value="false"><span class="off">Off</span><span class="on">On</span></div> -->
        <label>Code Behavior</label>
        <p class="instructions">Please select the behavior of the qr code.</p>
        <div class="custom-select">
            <div class="custom-select-value" id="code-type">- Select -</div>
            <ul class="custom-select-menu">
                <li data-value="static">Static URL</li>
                <li data-value="dynamic">Dynamic URL</li>
                <li data-value="vcard">vCard</li>
            </ul>
        </div>

        <div id="dynamic-url-container" style="display:none;">
            <label>Dynamic URL</label>
            <p class="instructions">This code is dynamic. When scanned it will lead to the url below.</p>
            <input type=text" value="" id="code-dynamic-url" />
        </div>

        <div id="static-url-container" style="display:none;">
            <label>Static URL</label>
            <p class="instructions">When someone scans your code it will lead to this url. Static codes cannot be changed.</p>
            <input type=text" value="" id="code-static-url" />
        </div>

        <a href="#" id="create-code-submit">Create Code</a>

    </div>
    <div id="create-code-preview">
        Preview
    </div>
</div>