<?php
// (A) GET IMAGE INFO
$file = "resources/plants.jpg";
$type = 'image/jpeg';

// (B) OUTPUT HTTP HEADERS
header("Content-Type: " . $type);
header("Content-Length: " . filesize($file));
 
// (C) READ FILE
readfile($file);
?>