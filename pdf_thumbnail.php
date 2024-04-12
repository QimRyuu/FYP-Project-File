<?php
// Get the file path from the query string
$filePath = $_GET['file'];

// Check if the file exists
if (file_exists($filePath)) {
    // Create an Imagick object
    $imagick = new Imagick();

    // Check file extension
    $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    if ($fileExtension === 'pdf') {
        // Set resolution to enhance image quality
        $imagick->setResolution(72, 72);

        // Read the PDF file
        $imagick->readImage($filePath);

        // Select the first page of the PDF
        $imagick->setIteratorIndex(0);

        // Convert PDF page to a JPEG image
        $imagick->setImageFormat('jpeg');

        // Set compression quality (optional)
        $imagick->setImageCompressionQuality(80);

        // Resize image if needed (optional)
        $imagick->resizeImage(100, 0, Imagick::FILTER_LANCZOS, 1);
    } else if ($fileExtension === 'png') {
        // Read the PNG file
        $imagick->readImage($filePath);
    }

    // Output the image
    header('Content-type: image/jpeg');
    echo $imagick->getImageBlob();

    // Destroy Imagick object
    $imagick->destroy();
} else {
    // File not found
    echo "File not found.";
}
?>
