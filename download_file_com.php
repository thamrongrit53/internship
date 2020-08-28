
<?php
$filename = "คอมพิวเตอร์.zip";

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=คอมพิวเตอร์.zip');

readfile($filename);
?>