<?php
// download.php
if (isset($_GET['file'])) {
    $url = urldecode($_GET['file']);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $imageContent = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200 && $imageContent !== false) {
        header('Content-Description: File Transfer');
        header('Content-Type: image/png'); 
        header('Content-Disposition: attachment; filename="qr-code.png"'); 
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($imageContent));
        
        // Clear the output buffer
        ob_clean();
        flush();
        
        // Output the image content
        echo $imageContent;
        exit;
    } else {
        echo "Could not retrieve the image.";
    }
} else {
    echo "No file specified.";
}
