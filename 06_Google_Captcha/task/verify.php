
<?php
session_start();

$user = $_POST['captcha_input'];

if ($user == $_SESSION['captcha']) {
    echo "✅ CAPTCHA Verified Successfully!";
} else {
    echo "❌ CAPTCHA Wrong. Try Again!";
}

<?php
session_start();

$user = $_POST['captcha_input'];

if ($user == $_SESSION['captcha']) {
    echo "✅ CAPTCHA Verified Successfully!";
} else {
    echo "❌ CAPTCHA Wrong. Try Again!";
}
 (Upload files)
?>