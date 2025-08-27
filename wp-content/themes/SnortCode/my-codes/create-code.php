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

//   width: 300,                // Width in pixels
//   height: 300,               // Height in pixels
//   type: "canvas",            // "canvas" | "svg"
//   data: "https://example.com", // The content encoded in the QR

//   margin: 0,                 // Space around the QR code

//   image: "https://example.com/logo.png", // Optional logo in the center
//   qrOptions: {
//     typeNumber: 0,           // QR version (0 = auto)
//     mode: "Byte",            // "Numeric" | "Alphanumeric" | "Byte"
//     errorCorrectionLevel: "Q" // "L" | "M" | "Q" | "H"
//   },

//   imageOptions: {
//     hideBackgroundDots: true, // Don’t render dots under the logo
//     imageSize: 0.4,           // Logo size (relative to QR)
//     margin: 0,                // Extra margin around logo
//     crossOrigin: "anonymous"  // For loading external images
//   },

//   dotsOptions: {
//     color: "#000",            // Color of dots
//     gradient: {               // Gradient fill for dots
//       type: "linear",         // "linear" | "radial"
//       rotation: 0,            // In radians (e.g., Math.PI / 2)
//       colorStops: [
//         { offset: 0, color: "#000" },
//         { offset: 1, color: "#ff0000" }
//       ]
//     },
//     type: "rounded"           // "dots" | "rounded" | "classy" | 
//                               // "classy-rounded" | "square" | "extra-rounded"
//   },

//   cornersSquareOptions: {
//     color: "#000",            // Color of outer squares
//     gradient: {               // Gradient for outer squares
//       type: "radial",
//       colorStops: [
//         { offset: 0, color: "#000" },
//         { offset: 1, color: "#00f" }
//       ]
//     },
//     type: "extra-rounded"     // "dot" | "square" | "extra-rounded"
//   },

//   cornersDotOptions: {
//     color: "#000",            // Color of corner dots
//     gradient: {               // Gradient for corner dots
//       type: "linear",
//       colorStops: [
//         { offset: 0, color: "#000" },
//         { offset: 1, color: "#0f0" }
//       ]
//     },
//     type: "dot"               // "dot" | "square"
//   },

//   backgroundOptions: {
//     color: "#fff",            // Background color
//     gradient: {               // Gradient background
//       type: "linear",
//       rotation: 0,
//       colorStops: [
//         { offset: 0, color: "#fff" },
//         { offset: 1, color: "#eee" }
//       ]
//     }
//   }

</script>