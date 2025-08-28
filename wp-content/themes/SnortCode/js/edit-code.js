$('body').on('click', '#edit-code-submit', function(e) {
    e.preventDefault();
    $('#overlay').addClass('active');

    var id = $(this).attr('data-id');
    var name = $('#code-name').val();
    var url = $('#code-url').val();
    var dot_style = $('#dot-style').attr('data-value');
    var dot_color = $('#dot-color').val();

    console.log(dot_color); 

    var data = {
        'id': id,
        'name': name,
        'url': url,
        'dot_style': dot_style,
        'dot_color': dot_color,
        'action': 'edit_code',
    };

    jQuery.ajax({
    type: "POST",
    dataType: "html",
    url: ajaxurl,
    data: data,
    dataType: 'json',
        success: function(data){
            // Run the generate code again to update frontend //
            $('#code-preview').empty();
            generateQRCode({
                url: data.url,
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
                dotcolor: data.dot_color,
                dotgradienttype: "", // "linear" | "radial"
                dotgradientstart: "",
                dotgradientend: "",
                dottype: data.dot_style,
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

            $('#overlay').removeClass('active');
        },
    });
});




