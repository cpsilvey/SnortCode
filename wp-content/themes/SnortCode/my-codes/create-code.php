<div id="create-code" class="clearfix">
    <h1>Create New Code</h1>
    <div id="create-code-form">
        <label>Name</label>
        <input type="text" value="" id="code-name" />
        <!-- <div class="custom-toggle" id="code-active" data-value="false"><span class="off">Off</span><span class="on">On</span></div> -->
        
        <label>QR Code Type</label>
        <div class="custom-radio" id="code-type" data-value="static">
            <div class="custom-radio-option active" data-value="static">Static <span>Encodes the URL directly. Once generated, it cannot be changed or tracked.</span></div>
            <?php if (plan_is_plus() || plan_is_premium()) { ?>
                <div class="custom-radio-option" data-value="dynamic">Dynamic <span>Points to a link you control, so you can edit the destination and track usage.</span></div>
            <?php } else { ?>
                <div class="custom-radio-option disabled">Dynamic<span>Upgrade to Plus to unlock</span></div>
            <?php } ?>
            <?php if (plan_is_premium()) { ?>
                <div class="custom-radio-option" data-value="vcard">vCard <span>Stores a digital business card (name, phone, email, etc.) that users can save to contacts.</span></div>
            <?php } else { ?>
                <div class="custom-radio-option disabled">vCard<span>Upgrade to Premium to unlock</span></div>
            <?php } ?>
        </div>

        <div id="url-container">
            <label>Destination URL
                <span>Enter the full link where you want the QR code to point (e.g., https://example.com).</span>
            </label>
            <input type=text" id="code-url" />
        </div>

        <a href="#" id="create-code-submit" class="button-aqua">Create Code</a>

    </div>
    <div id="create-code-preview">
        <div id="qrcode"></div>
    </div>
</div>