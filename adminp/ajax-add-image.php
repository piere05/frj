<?php

if (!isset($_POST['image'])) {
    exit;
}

$data = $_POST['image'];

// Remove base64 header
$data = preg_replace('#^data:image/\w+;base64,#i', '', $data);
$imageData = base64_decode($data);

$upload_dir = 'uploads/gallery-file/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$file_name = uniqid() . '.webp';
$file_path = $upload_dir . $file_name;

// Save file
file_put_contents($file_path, $imageData);

// Remove old image if exists
if (!empty($_POST['old_image'])) {
    $old = 'uploads/' . $_POST['old_image'];
    if (file_exists($old)) {
        unlink($old);
    }
}

// Return relative path for hidden input
echo 'gallery-file/' . $file_name;
?>