<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
        
        // Basic file validation
        $fileType = mime_content_type($_FILES['photo']['tmp_name']);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            die('Invalid file type.');
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            echo "<h1>File Uploaded Successfully</h1>";
            echo "<p><a href='gallery.html'>Go to Gallery</a></p>";
        } else {
            echo "<h1>Upload Failed</h1>";
        }
    } else {
        echo "<h1>No file uploaded or upload error.</h1>";
    }
}
?>
