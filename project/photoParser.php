<?php
function parsePhoto($fileContent) {
    // Get the file content
    
    // Encode the file content to base64
    $base64 = base64_encode($fileContent);
    
    // Create the img HTML tag
    $imgTag = '<img src="data:image/jpeg;base64,' . $base64 . '" alt="Photo">';
    
    return $imgTag;
}

?>