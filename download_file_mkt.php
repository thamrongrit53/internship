
<?php
$filename = "การตลาด.zip";

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=การตลาด.zip');

readfile($filename);
?>