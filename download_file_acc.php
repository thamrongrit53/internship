
<?php
$filename = "บัญชี.zip";

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=บัญชี.zip');

readfile($filename);
?>