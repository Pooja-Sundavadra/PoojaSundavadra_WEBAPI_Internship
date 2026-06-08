<?php

$name = $city = $email = $contact = $gender = $aadhar = $user = $pan = $pwd = $cpwd = "";
$nameerr = $cityerr = $emailerr = $contacterr = $gendererr = $aadharerr = $panerr = $usererr =  $pwderr = $cpwderr = "";
$successMsg = "";

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
        $successMsg = "Registration Successful!";
    }
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>STAR - Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:url('images/shop.jpg');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    padding:20px;
}

.register-box{
    width:100%;
    max-width:700px;

    background:linear-gradient(
        135deg,
        #fffdf5,
        #fff9e6,
        #fff4d6
    );

    border:2px solid #f8e7a1;

    border-radius:35px;

    padding:45px;

    box-shadow:
    0 15px 35px rgba(255,215,0,0.18);

    color:#333;
}

.register-box h1{
    text-align:center;
    font-size:40px;
    font-weight:700;

    color:#c9a227;

    margin-bottom:10px;
}

.register-box p{
    text-align:center;
    color:#666;
    margin-bottom:30px;
    font-size:15px;
}

.form-control,
.form-select{
    background:#ffffff;

    border:2px solid #f7e7b6;

    color:#333;

    height:55px;

    border-radius:15px;
}

.form-control::placeholder{
    color:#999;
}

.form-control:focus,
.form-select:focus{
    border-color:#e6c85c;

    box-shadow:
    0 0 12px rgba(230,200,92,0.25);

    outline:none;
}

.form-select{
    color:#333;
}

.input-group-text{
    background:linear-gradient(
        135deg,
        #f7d774,
        #efc84a
    );

    color:#333;
    border:none;
    font-weight:bold;
}

.btn-register{
    width:100%;
    height:60px;

    background:linear-gradient(
        135deg,
        #f7d774,
        #efc84a
    );

    border:none;
    border-radius:18px;

    color:#333;

    font-size:18px;
    font-weight:700;

    transition:0.4s;
}

.btn-register:hover{
    transform:translateY(-3px);

    box-shadow:
    0 10px 25px rgba(239,200,74,0.35);
}

.login-link{
    text-align:center;
    margin-top:20px;
}

.login-link a{
    color:#c9a227;
    text-decoration:none;
    font-weight:bold;
}

.login-link a:hover{
    color:#efc84a;
}

@media(max-width:768px){

    .register-box{
        padding:25px;
    }

    .register-box h1{
        font-size:30px;
    }

    .form-control,
    .form-select{
        height:50px;
    }

}

.error {
    color:red;
    font-size: 13px;
    display:block;
    margin-top:4px;
    min-height:20px;
}

.form-group{
    margin-bottom:20px;
}

</style>
</head>
<body>

<div class="register-box col-md-6 form-group">

    <h1>
        <i class="bi bi-stars"></i>
        Create Account
    </h1>

    <p>
    Join Our Shopping Experience ✨
    </p>

    <form method="POST">

<div class="row">

    <div class=" form-group">
        <input type="text" name="name" class="form-control"
        value="<?php echo htmlspecialchars($name); ?>"
        placeholder="First name                                Middle name                                    Last name">

        <span class="error"><?php echo $nameerr; ?></span>
    </div>

    <div class=" form-group">
        <input type="text" name="city" class="form-control"
        value="<?php echo htmlspecialchars($city); ?>"
        placeholder="City">

        <span class="error"><?php echo $cityerr; ?></span>
    </div>

</div>

<div class="row">

    <div class="col-md-6 form-group">
        <input type="text" name="email" class="form-control"
        value="<?php echo htmlspecialchars($email); ?>"
        placeholder="Email Address">

        <span class="error"><?php echo $emailerr; ?></span>
    </div>

    <div class="col-md-6 form-group">
        <input type="text" name="contact" class="form-control"
        value="<?php echo htmlspecialchars($contact); ?>"
        placeholder="Phone Number">

        <span class="error"><?php echo $contacterr; ?></span>
    </div>

</div>

<div class="row">

    <div class="col-md-6 form-group">
        <select name="gender" class="form-select">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <span class="error"><?php echo $gendererr; ?></span>
    </div>

    <div class="col-md-6 form-group">
        <input type="text" name="aadhar" class="form-control"
        value="<?php echo htmlspecialchars($aadhar); ?>"
        placeholder="Aadhaar Number">

        <span class="error"><?php echo $aadharerr; ?></span>
    </div>

</div>

<div class="row">

    <div class="col-md-6 form-group">
        <input type="text" name="pan" class="form-control"
        value="<?php echo htmlspecialchars($pan); ?>"
        placeholder="PAN Number">

        <span class="error"><?php echo $panerr; ?></span>
    </div>

    <div class="col-md-6 form-group">
        <input type="text" name="username" class="form-control"
        value="<?php echo htmlspecialchars($user); ?>"
        placeholder="Username">

        <span class="error"><?php echo $usererr; ?></span>
    </div>

</div>

<div class="row">
    <div class="col-md-6 form-group">
    <input type="password" name="password" class="form-control"
    placeholder="Password">

    <span class="error"><?php echo $pwderr; ?></span>
</div>

<div class="col-md-6 form-group">
    <input type="password" name="confirm_password"
    class="form-control"
    placeholder="Confirm Password">

    <span class="error"><?php echo $cpwderr; ?></span>
</div>
</div>

<button type="submit" class="btn btn-register">
    <i class="bi bi-person-plus-fill"></i>
    REGISTER NOW
</button>

<div class="login-link">
    Already have an account?
    <a href="login.php">Login</a>
</div>

</form>
</div>

</body>
</html>