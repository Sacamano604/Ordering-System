<?php
// Get File Size and Type
$fileSize = $_FILES['uploadme']['size']; 
$fileType = $_FILES['uploadme']['type'];

// Set Parameters
$maxSize = 5 * 1024 * 1024; // 5 MB
$acceptType = "image/jpeg"; // OPTIONALLY image/gif

// Check Parameters for Verification
if ($fileSize > $maxSize) {
echo "<h3>Sorry. Your file is <strong>$fileSize</strong> kb! Max size is $maxSize kb.</h3>";
echo "<p><a href=\"#\" onclick=\"history.back(); return false;\">< Please try again</a></p>";
exit;
}
if ($fileType != $acceptType) {
echo "<h3>Sorry. Your file is <strong>$fileType</strong>! We only accpet is $acceptType.</h3>";
echo "<p><a href=\"#\" onclick=\"history.back(); return false;\">< Please try again</a></p>";
exit;
}
?>