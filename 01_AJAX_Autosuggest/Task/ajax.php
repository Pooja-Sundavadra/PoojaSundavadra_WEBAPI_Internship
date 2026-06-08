<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>

    <style>

        body{
    font-family: Arial, sans-serif;
    background:#0f172a;
    margin:0;
    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;
}

 .container{
    width: 1000px;
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow : 0 15px 35px rgba(0,0,0,.15);
    text-align:center;
 }       

#result{
    width:100%;
    overflow-x:auto;
    margin-top:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

th{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    padding:14px;
    font-size:15px;
    text-transform:uppercase;
    letter-spacing:0.5px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #e5e7eb;
    color:#333;
}

tr:nth-child(even){
    background:#f8fafc;
}

tr:hover{
    background:#dbeafe;
    transition:0.3s;
}



    </style>

   
</head>
<body>

    <div class="container">
            <h2>Student Internship</h2>

    <select id="mode" onchange= "getInternship(this.value)">
        <option value="">Select Mode</option>
        <option value="onsite">onsite</option>
        <option value="online">online</option>
        <option value="hybrid">hybrid</option>
    </select>

    <div id="result"></div>
    </div>

     <script>

    function getInternship(mode)
{
    if(mode == "")
    {
        document.getElementById("result").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            document.getElementById("result").innerHTML =
            xhr.responseText;
        }
    };

    xhr.open("GET", "ajaxseach.php?mode=" + mode, true);
    xhr.send();
}


    </script>
    
</body>
</html>