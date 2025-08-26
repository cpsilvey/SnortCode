
<?php
require get_template_directory().'/vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;

$svg_builder = new Builder(
    writer: new SvgWriter(),
    writerOptions: [
        SvgWriter::WRITER_OPTION_EXCLUDE_XML_DECLARATION => true
    ],
    data: 'https://www.q4impact.com',
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    size: 500,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    //logoPath: __DIR__.'/assets/bender.png',
    logoResizeToWidth: 50,
    logoPunchoutBackground: false,
    //labelText: 'This is the label',
    labelFont: new OpenSans(20),
    labelAlignment: LabelAlignment::Center
);

$result = $svg_builder->build();
$dataUri = $result->getDataUri();
?>
<img src="<?php echo $dataUri; ?>" />

<?php 
$builder = new Builder(
    writer: new PngWriter(),
    writerOptions: [],
    validateResult: false,
    data: 'https://www.q4impact.com',
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    size: 500,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    //logoPath: __DIR__.'/assets/bender.png',
    logoResizeToWidth: 50,
    logoPunchoutBackground: false,
    //labelText: 'This is the label',
    labelFont: new OpenSans(20),
    labelAlignment: LabelAlignment::Center
);

$result = $builder->build();
$dataUri = $result->getDataUri();

?>
<img src="<?php echo $dataUri; ?>" />

<a href="#" class="create-code" style="margin-top:50px; display:inline-block;">Click Me</a>

<?php get_footer() ?>
