<div id="create-code" class="clearfix">
    <h1>Create New Code</h1>
    <div id="create-code-form">
        <label>Name</label>
        <input type="text" value="" id="code-name" />
        <!-- <div class="custom-toggle" id="code-active" data-value="false"><span class="off">Off</span><span class="on">On</span></div> -->
        
        <label>QR Code Type</label>
        <div class="custom-radio" id="code-type" data-value="">
            <div class="custom-radio-option active" data-value="static">Static <span>Encodes the URL directly. Once generated, it cannot be changed or tracked.</span></div>
            <div class="custom-radio-option" data-value="dynamic">Dynamic <span>Points to a link you control, so you can edit the destination and track usage.</span></div>
            <div class="custom-radio-option" data-value="vcard">vCard <span>Stores a digital business card (name, phone, email, etc.) that users can save to contacts.</span></div>
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

<script>
const qrCode = new QRCodeStyling({
    width: 200,
    height: 200,
    data: "https://yourwebsite.com",
    dotsOptions: {
    color: "#000",            // Color of dots
    type: "square"           // "dots" | "rounded" | "classy" | 
                              // "classy-rounded" | "square" | "extra-rounded"
    },
});

qrCode.append(document.getElementById("qrcode"));



</script>