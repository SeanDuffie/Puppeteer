<?php
// (A) GET IMAGE INFO
$file = "resources/time-lapse.mp4";
$type = 'video/mpeg';

// (B) OUTPUT HTTP HEADERS
header('Content-type: '.$type);
header('Content-Length: '.filesize($file)); // provide file size
header("Expires: -1");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// (C) READ FILE
readfile($path);
?>