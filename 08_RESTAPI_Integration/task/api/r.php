<?php

header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config.php";

// ================= GET INPUT =================
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        "status" => false,
        "message" => "No data received"
    ]);
    exit;
}

$fullname = trim($data['name'] ?? '');
$email    = trim($data['email'] ?? '');
$password = trim($data['password'] ?? '');
$captcha  = $data['captcha'] ?? '';

// ================= VALIDATION =================
if (empty($fullname)) {
    echo json_encode([
        "status" => false,
        "message" => "Full Name is required"
    ]);
    exit;
}

if (empty($email)) {
    echo json_encode([
        "status" => false,
        "message" => "Email is required"
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "status" => false,
        "message" => "Invalid email format"
    ]);
    exit;
}

if (empty($password)) {
    echo json_encode([
        "status" => false,
        "message" => "Password is required"
    ]);
    exit;
}

// ================= CAPTCHA VERIFY =================
if (!empty($captcha)) {

    $secretKey = "6LcDRhUtAAAAADHOtyATZipdSrFmHuc81YwU3xa2";

    $verify = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha
    );

    $response = json_decode($verify);

    if (!$response || !$response->success) {
        echo json_encode([
            "status" => false,
            "message" => "Captcha verification failed"
        ]);
        exit;
    }
}

// ================= CHECK EMAIL EXISTS =================
$check = mysqli_query($conn, "SELECT user_id FROM users WHERE email='$email'");

if ($check && mysqli_num_rows($check) > 0) {
    echo json_encode([
        "status" => false,
        "message" => "Email already registered"
    ]);
    exit;
}

// ================= INSERT USER =================
$hash_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
);

if (!$stmt) {
    echo json_encode([
        "status" => false,
        "message" => "Prepare failed: " . mysqli_error($conn)
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hash_password);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "status" => true,
        "message" => "Registration successful"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Database error: " . mysqli_stmt_error($stmt)
    ]);
}

?>