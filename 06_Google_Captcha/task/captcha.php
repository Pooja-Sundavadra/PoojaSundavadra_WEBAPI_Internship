<?php
session_start();

// Random string generate
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$captcha = "";

for ($i = 0; $i < 6; $i++) {
    $captcha .= $chars[rand(0, strlen($chars)-1)];
}

// Store in session
$_SESSION['captcha'] = $captcha;

// Create image
$image = imagecreate(120, 40);

// Colors
$bg = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

// Add text
imagestring($image, 5, 30, 10, $captcha, $text_color);

// Output image
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>