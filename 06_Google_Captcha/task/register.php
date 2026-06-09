
<?php

include("config.php");

$name = $city = $email = $contact = $gender = $aadhar = $user = $pan = $pwd = $cpwd = "";
$nameerr = $cityerr = $emailerr = $contacterr = $gendererr = $aadharerr = $panerr = $usererr =  $pwderr = $cpwderr = "";
$successMsg = "";
$captchaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $captcha = $_POST['g-recaptcha-response'];

    if (empty($captcha)) {
        $captchaErr = "Please verify captcha";
        $valid = false;
    } else {

        $secretKey = "6LcDRhUtAAAAADHOtyATZipdSrFmHuc81YwU3xa2";

        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret="
            . $secretKey
            . "&response=" . $captcha
        );

        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            $captchaErr = "Captcha verification failed";
            $valid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    // Name Validation
    if (empty($_POST["name"])) {
        $nameerr = "Full Name is required";
        $valid = false;
    } else {
        $name = trim($_POST["name"]);

        if (!preg_match("/^[a-zA-Z]+ [a-zA-Z ]+ [a-zA-Z ]+$/", $name)) {
            $nameerr = "Only letters and spaces allowed (Full name must be required)";
            $valid = false;
        }
    }

    //city
    if(empty($_POST['city']))
        {
            $cityerr = "City is required";
            $valid = false ;
        }
        else{
            $city = trim($_POST['city']);
            {
                if(!preg_match("/^[A-Za-z ]+$/", $city))
                    {
                        $cityerr = "Invalid city ";
                        $valid = false;
                    }
            }
        }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailerr = "Email is required";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);

        if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
            $emailerr = "Invalid email format";
            $valid = false;
        }
    }

    // Indian Mobile Number Validation
    if (empty($_POST["contact"])) {
        $contacterr = "Phone number is required";
        $valid = false;
    } else {
        $contact = trim($_POST["contact"]);

        if (!preg_match("/^[6-9]\d{9}$/", $contact)) {
            $contacterr = "Invalid Indian mobile number";
            $valid = false;
        }
    }

    //Gender
    if(empty($_POST['gender']))
        {
            $gendererr = "Select Gender";
            $valid = false;
        }
    else{
        $gender = $_POST['gender'];
    }    

    // Aadhaar
    if(empty($_POST['aadhar']))
    {
        $aadharerr = "Aadhaar Number is required";
        $valid = false;
    }
    else{
        $aadhar = trim($_POST['aadhar']);
        if(!preg_match("/^[0-9]{12}$/", $aadhar))
            {

                $aadharerr = "Invalid Aadhaar Number";
                $valid = false;

            }

    }

    // PAN Card Validation
    if (empty($_POST["pan"])) {
        $panerr = "PAN Number is required";
        $valid = false;
    } else {
        $pan = strtoupper(trim($_POST["pan"]));

        if (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/", $pan)) {
            $panerr = "Invalid PAN Number";
            $valid = false;
        }
    }

    //Username
    if(empty($_POST['username']))
        {
            $usererr = "Username is required";
            $valid = false;
        }
    else{
        $user = trim($_POST['username']);
        if(!preg_match("/^[A-Za-z0-9_ ]{4,30}$/",$user))
            {
                $usererr = "Invalid username";
                $valid = false;
            }
    }    

    // Strong Password Validation
    if (empty($_POST["password"])) {
        $pwderr = "Password is required";
        $valid = false;
    } else {
        $pwd = $_POST["password"];

        $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

        if (!preg_match($pattern, $pwd)) {
            $pwderr = "Password must contain uppercase, lowercase, number, special character and be at least 8 characters long.";
            $valid = false;
        }
    }

    // Confirm Password
    if(empty($_POST['confirm_password']))
        {
            $cpwderr = "Confirm password is required";
            $valid = false;
        }
        else{
            $cpwd = $_POST['confirm_password'];

            if($pwd != $cpwd)
                {
                    $cpwderr = "Password do not match";
                    $valid =  false;
                }
        }

    // Success
    if ($valid) {
       if ($valid) {

    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    $query = "INSERT INTO users 
    (name, city, email, contact, gender, aadhar, pan, username, password)
    VALUES
    ('$name','$city','$email','$contact','$gender','$aadhar','$pan','$user','$hashed_password')";

    if(mysqli_query($conn,$query)){
        echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Star Shopping Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
background:#ffffff;
display:flex;
justify-content:center;
align-items:center;
padding:20px;
}

.register-box{
width:100%;
max-width:900px;
background:linear-gradient(135deg,#ff4e8a,#7a00ff);
backdrop-filter:blur(20px);
border-radius:30px;
padding:40px;
box-shadow:0 20px 50px rgba(0,0,0,0.2);
color:white;
}

.logo{
text-align:center;
font-size:40px;
font-weight:700;
}

.form-control, .form-select{
height:55px;
border-radius:15px;
border:none;
}

.btn-register{
width:100%;
height:55px;
border:none;
border-radius:50px;
background:linear-gradient(45deg,#ff4e8a,#7a00ff);
color:white;
font-weight:bold;
transition:0.3s;
}

.btn-register:hover{
transform:translateY(-5px);
}

.error{
color:#ffecec;
font-size:13px;
}

.g-recaptcha{
    display:flex;
    justify-content:center;
}

</style>

</head>

<body>

<div class="register-box">

<div class="logo">🌟 STAR SHOPPING</div>
<p class="text-center">Create your account 💗</p>

<form method="POST">

<div class="row">

<div class="col-md-6">
<input type="text" name="name" class="form-control mb-2" placeholder="Full Name">
<span class="error"><?php echo $nameerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="city" class="form-control mb-2" placeholder="City">
<span class="error"><?php echo $cityerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="email" class="form-control mb-2" placeholder="Email">
<span class="error"><?php echo $emailerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="contact" class="form-control mb-2" placeholder="Phone">
<span class="error"><?php echo $contacterr; ?></span>
</div>

<div class="col-md-6">
<select name="gender" class="form-select mb-2">
<option value="">Gender</option>
<option>Male</option>
<option>Female</option>
</select>
<span class="error"><?php echo $gendererr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="aadhar" class="form-control mb-2" placeholder="Aadhaar">
<span class="error"><?php echo $aadharerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="pan" class="form-control mb-2" placeholder="PAN">
<span class="error"><?php echo $panerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="username" class="form-control mb-2" placeholder="Username">
<span class="error"><?php echo $usererr; ?></span>
</div>

<div class="col-md-6">
<input type="password" name="password" class="form-control mb-2" placeholder="Password">
<span class="error"><?php echo $pwderr; ?></span>
</div>

<div class="col-md-6">
<input type="password" name="confirm_password" class="form-control mb-2" placeholder="Confirm Password">
<span class="error"><?php echo $cpwderr; ?></span>
</div>

<div class="mt-3 mb-3">

    <div class="g-recaptcha"
         data-sitekey="6LcDRhUtAAAAANGneigklePNtlH-D3YkzeTyXU_z"></div>

    <span class="error">
        <?php echo $captchaErr ?? ''; ?>
    </span>

</div>

</div>

<button type="submit" class="btn btn-register mt-3">
✨ REGISTER NOW
</button>

</form>

</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

<?php

include("config.php");

$name = $city = $email = $contact = $gender = $aadhar = $user = $pan = $pwd = $cpwd = "";
$nameerr = $cityerr = $emailerr = $contacterr = $gendererr = $aadharerr = $panerr = $usererr =  $pwderr = $cpwderr = "";
$successMsg = "";
$captchaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $captcha = $_POST['g-recaptcha-response'];

    if (empty($captcha)) {
        $captchaErr = "Please verify captcha";
        $valid = false;
    } else {

        $secretKey = "6LcDRhUtAAAAADHOtyATZipdSrFmHuc81YwU3xa2";

        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret="
            . $secretKey
            . "&response=" . $captcha
        );

        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            $captchaErr = "Captcha verification failed";
            $valid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    // Name Validation
    if (empty($_POST["name"])) {
        $nameerr = "Full Name is required";
        $valid = false;
    } else {
        $name = trim($_POST["name"]);

        if (!preg_match("/^[a-zA-Z]+ [a-zA-Z ]+ [a-zA-Z ]+$/", $name)) {
            $nameerr = "Only letters and spaces allowed (Full name must be required)";
            $valid = false;
        }
    }

    //city
    if(empty($_POST['city']))
        {
            $cityerr = "City is required";
            $valid = false ;
        }
        else{
            $city = trim($_POST['city']);
            {
                if(!preg_match("/^[A-Za-z ]+$/", $city))
                    {
                        $cityerr = "Invalid city ";
                        $valid = false;
                    }
            }
        }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailerr = "Email is required";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);

        if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
            $emailerr = "Invalid email format";
            $valid = false;
        }
    }

    // Indian Mobile Number Validation
    if (empty($_POST["contact"])) {
        $contacterr = "Phone number is required";
        $valid = false;
    } else {
        $contact = trim($_POST["contact"]);

        if (!preg_match("/^[6-9]\d{9}$/", $contact)) {
            $contacterr = "Invalid Indian mobile number";
            $valid = false;
        }
    }

    //Gender
    if(empty($_POST['gender']))
        {
            $gendererr = "Select Gender";
            $valid = false;
        }
    else{
        $gender = $_POST['gender'];
    }    

    // Aadhaar
    if(empty($_POST['aadhar']))
    {
        $aadharerr = "Aadhaar Number is required";
        $valid = false;
    }
    else{
        $aadhar = trim($_POST['aadhar']);
        if(!preg_match("/^[0-9]{12}$/", $aadhar))
            {

                $aadharerr = "Invalid Aadhaar Number";
                $valid = false;

            }

    }

    // PAN Card Validation
    if (empty($_POST["pan"])) {
        $panerr = "PAN Number is required";
        $valid = false;
    } else {
        $pan = strtoupper(trim($_POST["pan"]));

        if (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/", $pan)) {
            $panerr = "Invalid PAN Number";
            $valid = false;
        }
    }

    //Username
    if(empty($_POST['username']))
        {
            $usererr = "Username is required";
            $valid = false;
        }
    else{
        $user = trim($_POST['username']);
        if(!preg_match("/^[A-Za-z0-9_ ]{4,30}$/",$user))
            {
                $usererr = "Invalid username";
                $valid = false;
            }
    }    

    // Strong Password Validation
    if (empty($_POST["password"])) {
        $pwderr = "Password is required";
        $valid = false;
    } else {
        $pwd = $_POST["password"];

        $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

        if (!preg_match($pattern, $pwd)) {
            $pwderr = "Password must contain uppercase, lowercase, number, special character and be at least 8 characters long.";
            $valid = false;
        }
    }

    // Confirm Password
    if(empty($_POST['confirm_password']))
        {
            $cpwderr = "Confirm password is required";
            $valid = false;
        }
        else{
            $cpwd = $_POST['confirm_password'];

            if($pwd != $cpwd)
                {
                    $cpwderr = "Password do not match";
                    $valid =  false;
                }
        }

    // Success
    if ($valid) {
       if ($valid) {

    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    $query = "INSERT INTO users 
    (name, city, email, contact, gender, aadhar, pan, username, password)
    VALUES
    ('$name','$city','$email','$contact','$gender','$aadhar','$pan','$user','$hashed_password')";

    if(mysqli_query($conn,$query)){
        echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Star Shopping Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
background:#ffffff;
display:flex;
justify-content:center;
align-items:center;
padding:20px;
}

.register-box{
width:100%;
max-width:900px;
background:linear-gradient(135deg,#ff4e8a,#7a00ff);
backdrop-filter:blur(20px);
border-radius:30px;
padding:40px;
box-shadow:0 20px 50px rgba(0,0,0,0.2);
color:white;
}

.logo{
text-align:center;
font-size:40px;
font-weight:700;
}

.form-control, .form-select{
height:55px;
border-radius:15px;
border:none;
}

.btn-register{
width:100%;
height:55px;
border:none;
border-radius:50px;
background:linear-gradient(45deg,#ff4e8a,#7a00ff);
color:white;
font-weight:bold;
transition:0.3s;
}

.btn-register:hover{
transform:translateY(-5px);
}

.error{
color:#ffecec;
font-size:13px;
}

.g-recaptcha{
    display:flex;
    justify-content:center;
}

</style>

</head>

<body>

<div class="register-box">

<div class="logo">🌟 STAR SHOPPING</div>
<p class="text-center">Create your account 💗</p>

<form method="POST">

<div class="row">

<div class="col-md-6">
<input type="text" name="name" class="form-control mb-2" placeholder="Full Name">
<span class="error"><?php echo $nameerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="city" class="form-control mb-2" placeholder="City">
<span class="error"><?php echo $cityerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="email" class="form-control mb-2" placeholder="Email">
<span class="error"><?php echo $emailerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="contact" class="form-control mb-2" placeholder="Phone">
<span class="error"><?php echo $contacterr; ?></span>
</div>

<div class="col-md-6">
<select name="gender" class="form-select mb-2">
<option value="">Gender</option>
<option>Male</option>
<option>Female</option>
</select>
<span class="error"><?php echo $gendererr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="aadhar" class="form-control mb-2" placeholder="Aadhaar">
<span class="error"><?php echo $aadharerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="pan" class="form-control mb-2" placeholder="PAN">
<span class="error"><?php echo $panerr; ?></span>
</div>

<div class="col-md-6">
<input type="text" name="username" class="form-control mb-2" placeholder="Username">
<span class="error"><?php echo $usererr; ?></span>
</div>

<div class="col-md-6">
<input type="password" name="password" class="form-control mb-2" placeholder="Password">
<span class="error"><?php echo $pwderr; ?></span>
</div>

<div class="col-md-6">
<input type="password" name="confirm_password" class="form-control mb-2" placeholder="Confirm Password">
<span class="error"><?php echo $cpwderr; ?></span>
</div>

<div class="mt-3 mb-3">

    <div class="g-recaptcha"
         data-sitekey="6LcDRhUtAAAAANGneigklePNtlH-D3YkzeTyXU_z"></div>

    <span class="error">
        <?php echo $captchaErr ?? ''; ?>
    </span>

</div>

</div>

<button type="submit" class="btn btn-register mt-3">
✨ REGISTER NOW
</button>

</form>

</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
 (Upload files)
</html>