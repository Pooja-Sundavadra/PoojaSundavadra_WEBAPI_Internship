<?php

include "phpqrcode/qrlib.php";

$qr_image = "";
$text = "Welcome to STAR SHOPPING - Online Store | Offers | Deals | Scan & Shop";

if (!is_dir("qr_images")) {
    mkdir("qr_images");
}

$filename = "qr_images/star_qr.png";

/* Always regenerate same QR (static) */
QRcode::png($text, $filename, QR_ECLEVEL_L, 6);

$qr_image = $filename;

?>

<!DOCTYPE html>
<html>
<head>
    <title>STAR SHOPPING QR Code</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            color:white;
            text-align:center;
        }

        .header{
            padding:25px;
            font-size:30px;
            font-weight:bold;
            background: rgba(0,0,0,0.3);
            letter-spacing:2px;
        }

        .sub{
            margin-top:10px;
            font-size:16px;
            color:#ffd700;
        }

        .card{
            width:320px;
            margin:50px auto;
            background:white;
            color:black;
            padding:25px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.3);
        }

        .card h3{
            color:#2c5364;
            margin-bottom:15px;
        }

        img{
            width:250px;
            height:250px;
            border:5px solid #2c5364;
            border-radius:10px;
        }

        .footer{
            margin-top:20px;
            font-size:14px;
            color:gray;
        }

        .badge{
            background:gold;
            color:black;
            padding:5px 10px;
            border-radius:20px;
            font-size:12px;
            display:inline-block;
            margin-top:10px;
        }
    </style>

</head>

<body>

<div class="header">
    ⭐ STAR SHOPPING
    <div class="sub">Scan & Explore Amazing Deals 🛍️✨</div>
</div>

<div class="card">

    <h3>Official Store QR Code</h3>

    <img src="<?php echo $qr_image; ?>" alt="QR Code">

    <div class="badge">SCAN TO SHOP NOW</div>

    <div class="footer">
        Powered by STAR SHOPPING System 💗
    </div>

</div>

</body>
</html>