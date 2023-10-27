<?php
// Check if the file was uploaded without errors
if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $tempFilePath = $_FILES['avatar']['tmp_name'];
    $fileName = $_FILES['avatar']['name'];
    
    // Move the uploaded file to a desired location
    $targetDir = 'public/image/upload/';
    $targetPath = $targetDir . $fileName;
    
    if (move_uploaded_file($tempFilePath, $targetPath)) {
        // File uploaded successfully
        echo "Avatar uploaded successfully!";
    } else {
        // Failed to move the uploaded file
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    // Handle file upload errors
    echo "Sorry, there was an error uploading your file.";
}
?>
