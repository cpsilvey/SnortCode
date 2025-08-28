<?php
$id = $_GET['id'];
$name = get_field('name', $id);
$url = get_field('url', $id);

// Get Code Appearance //
$dot_style = get_field('dot_style', $id);
$dot_color = get_field('dot_color', $id);
$corner_square_style = get_field('corner_square_style', $id);
?>
<div class="inner-wrapper">
    <div id="edit-code">
        <div id="edit-code-form">
            <h3>Code Content</h3>
            <label>Name</label>
            <input type="text" id="code-name" value="<?php echo $name; ?>" />
            <label>
                Destination URL
                <span>Enter the full link where you want the QR code to point (e.g., https://example.com).</span>
            </label>
            <input type="text" id="code-url" value="<?php echo $url; ?>" />

            <h3>Appearance</h3>

            <label>Dot Style</label>
            <div class="image-radio clearfix" id="dot-style" data-value="<?php echo $dot_style['value']; ?>">
                <div class="image-radio-option <?php if ($dot_style['value'] == 'square') { echo "active"; } ?>" data-value="square" id="dot-style-square"><span>Square</span></div>
                <div class="image-radio-option <?php if ($dot_style['value'] == 'rounded') { echo "active"; } ?>" data-value="rounded" id="dot-style-rounded"><span>Rounded</span></div>
                <div class="image-radio-option <?php if ($dot_style['value'] == 'extra-rounded') { echo "active"; } ?>" data-value="extra-rounded" id="dot-style-shell"><span>Shell</span></div>
                <div class="image-radio-option <?php if ($dot_style['value'] == 'dots') { echo "active"; } ?>" data-value="dots" id="dot-style-dots"><span>Dots</span></div>
                <div class="image-radio-option <?php if ($dot_style['value'] == 'classy') { echo "active"; } ?>" data-value="classy"><span>Eyes</span></div>
                <div class="image-radio-option <?php if ($dot_style['value'] == 'classy-rounded') { echo "active"; } ?>" data-value="classy-rounded"><span>Leaf</span></div>
            </div>
            
            <label>Dot Color</label>
            <div id="dot-color-container" class="clearfix">
                <div class="color-picker" id="dot-color-picker"></div>
                <input type="text" id="dot-color" value="<?php if($dot_color) { echo $dot_color; } else { echo '#000000'; } ?>" readonly />
            </div>

            <label>Corner Square Style</label>
            <div class="image-radio clearfix" id="corner-square-style" data-value="<?php echo $corner_square_style['value']; ?>">
                <div class="image-radio-option <?php if ($corner_square_style['value'] == 'square') { echo "active"; } ?>" data-value="square" id="corner-square-style-square"><span>Square</span></div>
                <div class="image-radio-option <?php if ($corner_square_style['value'] == 'rounded') { echo "active"; } ?>" data-value="rounded" id="corner-square-style-rounded"><span>Rounded</span></div>
                <div class="image-radio-option <?php if ($corner_square_style['value'] == 'extra-rounded') { echo "active"; } ?>" data-value="extra-rounded" id="corner-square-style-shell"><span>Shell</span></div>
                <div class="image-radio-option <?php if ($corner_square_style['value'] == 'dot') { echo "active"; } ?>" data-value="dot" id="corner-square-style-dot"><span>Dot</span></div>
                <div class="image-radio-option <?php if ($corner_square_style['value'] == 'classy') { echo "active"; } ?>" data-value="classy" id="corner-square-style-eye"><span>Eye</span></div>
                <div class="image-radio-option <?php if ($corner_square_style['value'] == 'classy-rounded') { echo "active"; } ?>" data-value="classy-rounded" id="corner-square-style-leaf"><span>Leaf</span></div>
            </div>

            <h3>Advanced</h3>

            <a href="#" id="edit-code-submit" class="button-aqua" data-id="<?php echo $id; ?>">Update Code</a>
        </div>
        <div id="edit-code-preview">
            <div id="code-preview"></div>
        </div>
    </div>
</div>

<script>
$( document ).ready(function() {
    // Initialize the color pickers //
    const dotColorPickr = Pickr.create({
        el: '#dot-color-picker',
        theme: 'nano', // or 'monolith', 'nano'
        default: '<?php echo $dot_color; ?>' || '#000000', // initial color
        components: {
            preview: true,
            opacity: false,
            hue: true,
            interaction: {
                hex: true,
                input: true,
                save: true,
            }
        }
    });
    const hexInput = document.querySelector('#dot-color');
    hexInput.addEventListener('click', () => {
        dotColorPickr.show(); // open picker manually
    });
    dotColorPickr.on('save', (color, instance) => {
        if (color) {
            // Convert color to HEX (without alpha)
            const hexColor = color.toHEXA().toString();
            // Set value of another input field
            document.querySelector('#dot-color').value = hexColor;
            dotColorPickr.hide();
        }
    });
    // Initial code generation //
    generateQRCode({
        url: "<?php echo $url; ?>",
        qrtype: "svg",
        elementId: "code-preview",
        width: 300,
        height: 300,
        margin: 0,
        image: "",
        // Corner Squares //
        cornersquarecolor: "",
        cornersquaregradienttype: "", // "linear" | "radial"
        cornersquaregradientstart: "",
        cornersquaregradientend: "",
        cornersquaretype: "<?php echo $corner_square_style['value']; ?>", // "dot" | "dots" | "rounded" | "classy" | "classy-rounded" | "square" | "extra-rounded"
        // Corner Dots //
        cornerdotcolor: "#ff0000",
        cornerdotgradienttype: "", // "linear" | "radial"
        cornerdotgradientstart: "",
        cornerdotgradientend: "",
        cornerdottype: "rounded", // "dots" | "rounded" | "classy" | "classy-rounded" | "square" | "extra-rounded"
        // Dots //
        dotcolor: "<?php echo $dot_color; ?>",
        dotgradienttype: "", // "linear" | "radial"
        dotgradientstart: "",
        dotgradientend: "",
        dottype: "<?php echo $dot_style['value']; ?>", // "dots" | "rounded" | "classy" | "classy-rounded" | "square" | "extra-rounded"
        // BG //
        backgroundcolor: "",
        backgroundgradienttype: "",
        backgroundgradientstart: "",
        backgroundgradientend: "",
        // Image //
        imagehidedots: true,
        imagesize: 0.5,
        imagemargin: 0,
    });
});
</script>