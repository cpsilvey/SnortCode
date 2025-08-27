// make function available everywhere
// Expose function globally so AJAX callbacks can use it
window.generateQRCode = function (options) {
    //******* Conditional Corner Square Options *********/
    let cornersSquareOptions = { type: options.cornersquaretype || "square" };
    if (options.cornersquarecolor) {
        cornersSquareOptions.color = options.cornersquarecolor;
    }
    if (options.cornersquaregradientstart && options.cornersquaregradientend) {
        cornersSquareOptions.gradient = {
            type: options.cornersquaregradienttype || "linear",
            colorStops: [
                { offset: 0, color: options.cornersquaregradientstart },
                { offset: 1, color: options.cornersquaregradientend }
            ]
        };
    }

    //******* Conditional Corner Dot Options *********/
    let cornersDotOptions = { type: options.cornerdottype || "square" };
    if (options.cornerdotcolor) {
        cornersDotOptions.color = options.cornerdotcolor;
    }
    if (options.cornerdotgradientstart && options.cornerdotgradientend) {
        cornersDotOptions.gradient = {
            type: options.cornerdotgradienttype || "linear",
            colorStops: [
                { offset: 0, color: options.cornerdotgradientstart },
                { offset: 1, color: options.cornerdotgradientend }
            ]
        };
    }

    //******* Conditional Dot Options *********/
    let dotsOptions = { type: options.dottype || "square" };
    if (options.dotcolor) {
        dotsOptions.color = options.dotcolor;
    }
    if (options.dotgradientstart && options.dotgradientend) {
        dotsOptions.gradient = {
            type: options.dotgradienttype || "linear",
            colorStops: [
                { offset: 0, color: options.dotgradientstart },
                { offset: 1, color: options.dotgradientend }
            ]
        };
    }

    //******* Background Options *********/
    let backgroundOptions = {};
    if (options.backgroundcolor) {
        backgroundOptions.color = options.backgroundcolor;
    }
    if (options.backgroundgradientstart && options.backgroundgradientend) {
        backgroundOptions.gradient = {
            type: options.backgroundgradienttype || "linear",
            colorStops: [
                { offset: 0, color: options.backgroundgradientstart },
                { offset: 1, color: options.backgroundgradientend }
            ]
        };
    }

    const qrCode = new QRCodeStyling({
        qrOptions: {
            typeNumber: 0,
            mode: "Byte",
            errorCorrectionLevel: "Q"
        },
        width: options.width || 200,
        height: options.height || 200,
        type: options.qrtype || "canvas",
        data: options.url || "",
        margin: options.margin || 0,
        image: options.image || "",
        dotsOptions: dotsOptions,
        cornersSquareOptions: cornersSquareOptions,
        cornersDotOptions: cornersDotOptions,
        backgroundOptions: backgroundOptions,
        imageOptions: {
            hideBackgroundDots: options.imagehidedots ?? true,
            imageSize: options.imagesize || 0.5,
            margin: options.imagemargin || 0,
            crossOrigin: "anonymous"
        }
    });

    const targetElement = document.getElementById(options.elementId);
    if (targetElement) {
        // clear old QR before appending a new one
        targetElement.innerHTML = "";
        qrCode.append(targetElement);
    }
};