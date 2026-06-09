
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>CAPTCHA Verification</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#f6d365,#fda085);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial;
}

.card-box{
    background:#fff;
    padding:30px;
    border-radius:20px;
    width:400px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}

h3{
    margin-bottom:20px;
    font-weight:bold;
}

.captcha-img{
    border:2px solid #ddd;
    border-radius:10px;
    padding:5px;
    margin-bottom:10px;
}

.btn-refresh{
    margin-bottom:15px;
    background:#6c5ce7;
    color:#fff;
    border:none;
    padding:6px 12px;
    border-radius:8px;
}

.btn-refresh:hover{
    background:#341f97;
}

.form-control{
    border-radius:10px;
    height:45px;
}

.btn-submit{
    width:100%;
    background:linear-gradient(135deg,#00b09b,#96c93d);
    border:none;
    padding:10px;
    border-radius:10px;
    color:#fff;
    font-weight:bold;
    margin-top:10px;
}

.btn-submit:hover{
    opacity:0.9;
}
</style>

</head>

<body>

<div class="card-box">

    <h3>🔐 CAPTCHA Verification</h3>

    <img src="captcha.php" id="cap" class="captcha-img"><br>

    <button type="button" class="btn-refresh"
        onclick="cap.src='captcha.php?'+Date.now()">
        Refresh CAPTCHA
    </button>

    <form method="POST" action="verify.php">

        <input type="text" name="captcha_input"
               class="form-control"
               placeholder="Enter CAPTCHA"
               required>

        <button type="submit" class="btn-submit">
            Verify
        </button>

    </form>

</div>

</body>

<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>CAPTCHA Verification</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#f6d365,#fda085);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial;
}

.card-box{
    background:#fff;
    padding:30px;
    border-radius:20px;
    width:400px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}

h3{
    margin-bottom:20px;
    font-weight:bold;
}

.captcha-img{
    border:2px solid #ddd;
    border-radius:10px;
    padding:5px;
    margin-bottom:10px;
}

.btn-refresh{
    margin-bottom:15px;
    background:#6c5ce7;
    color:#fff;
    border:none;
    padding:6px 12px;
    border-radius:8px;
}

.btn-refresh:hover{
    background:#341f97;
}

.form-control{
    border-radius:10px;
    height:45px;
}

.btn-submit{
    width:100%;
    background:linear-gradient(135deg,#00b09b,#96c93d);
    border:none;
    padding:10px;
    border-radius:10px;
    color:#fff;
    font-weight:bold;
    margin-top:10px;
}

.btn-submit:hover{
    opacity:0.9;
}
</style>

</head>

<body>

<div class="card-box">

    <h3>🔐 CAPTCHA Verification</h3>

    <img src="captcha.php" id="cap" class="captcha-img"><br>

    <button type="button" class="btn-refresh"
        onclick="cap.src='captcha.php?'+Date.now()">
        Refresh CAPTCHA
    </button>

    <form method="POST" action="verify.php">

        <input type="text" name="captcha_input"
               class="form-control"
               placeholder="Enter CAPTCHA"
               required>

        <button type="submit" class="btn-submit">
            Verify
        </button>

    </form>

</div>

</body>
(Upload files)
</html>