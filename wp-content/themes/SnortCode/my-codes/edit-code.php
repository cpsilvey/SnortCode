<?php
$id = $_GET['id'];
$name = get_field('name', $id);
$url = get_field('url', $id);

// Get Code Appearance //
$dot_style = get_field('dot_style', $id);
$dot_color_mode = get_field('dot_color_mode', $id);
?>
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
        <h4>Dots</h4>
        <label>Style</label>
        <div class="custom-select">
            <div class="custom-select-value" data-value="<?php echo $dot_style['value']; ?>" id="dot-style"><?php echo $dot_style['label']; ?></div>
            <ul class="custom-select-menu">
                <li data-value="square">Square</li>
                <li data-value="rounded">Rounded</li>
                <li data-value="extra-rounded">Extra Rounded</li>
                <li data-value="dots">Dots</li>
                <li data-value="classy">Classy</li>
                <li data-value="classy-rounded">Classy Rounded</li>
            </ul>
        </div>
        <label>Color Mode</label>
        <div class="custom-radio" id="dot-color-mode" data-value="<?php echo $dot_color_mode['value']; ?>">
            <div class="custom-radio-option <?php if ($dot_color_mode['value'] == 'solid') { echo "active"; } ?>" data-value="solid">Solid</div>
            <div class="custom-radio-option <?php if ($dot_color_mode['value'] == 'gradient') { echo "active"; } ?>" data-value="gradient">Gradient</div>
        </div>

        <label>Color</label>
        <div class="color-picker" id="dot-color-picker"></div>

        <label>Gradient Start</label>
        <div class="color-picker" id="dot-gradient-start-picker"></div>

        <label>Gradient End</label>
        <div id="dot-gradient-end-picker"></div>

        <h3>Advanced</h3>

        <a href="#" id="edit-code-submit" class="button-aqua" data-id="<?php echo $id; ?>">Update Code</a>
    </div>
    <div id="edit-code-preview">
        <div id="code-preview"></div>
    </div>
</div>

<script>
$( document ).ready(function() {
    // Initialize the color pickers //
    const dotColorPickr = Pickr.create({
        el: '#dot-color-picker',
        theme: 'nano', // or 'monolith', 'nano'
        default: '#000000', // initial color
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
    const dotgradientstart = Pickr.create({
        el: '#dot-gradient-start-picker',
        theme: 'nano', // or 'monolith', 'nano'
        default: '#ffffff', // initial color
        swatches: ['#000000','#FF0000','#00FF00','#0000FF','#FFFF00','#FF00FF','#00FFFF'],
        components: {preview: true, opacity: false, hue: true, interaction: { hex: true, input: true, save: true }}
    });
    const dotgradientend = Pickr.create({
        el: '#dot-gradient-end-picker',
        theme: 'nano', // or 'monolith', 'nano'
        default: '#000000', // initial color
        swatches: [
            '#000000',
            '#FF0000',
            '#00FF00',
            '#0000FF',
            '#FFFF00',
            '#FF00FF',
            '#00FFFF'
        ],
        components: {
            preview: true,
            opacity: false,
            hue: true,

            interaction: {
                hex: true,
                input: true,
                save: true
            }
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
        cornersquaretype: "rounded", // "dots" | "rounded" | "classy" | "classy-rounded" | "square" | "extra-rounded"
        // Corner Dots //
        cornerdotcolor: "#ff0000",
        cornerdotgradienttype: "", // "linear" | "radial"
        cornerdotgradientstart: "",
        cornerdotgradientend: "",
        cornerdottype: "rounded", // "dots" | "rounded" | "classy" | "classy-rounded" | "square" | "extra-rounded"
        // Dots //
        dotcolor: "",
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