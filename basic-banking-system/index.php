<html>
<head>
<title>TSF BANK SYSTEM | Home</title>
<link rel="icon" href="images/icon.png">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">

<style>
    .navbar
    {
        width:100%;
        background-color: #000;
    }
    .main_div
    {
        width:100%;
        height:100vh;
        background-image:url("images/bgImage.jpg");
        background-size:cover;
    }
    .main_text
    {
        color:#000;
    }
    @media(min-width:400px)
    {
        .main_div
        {
            max-height:1000px;
        }
    }
</style>
</head>

<body>
<div class="main_div">
 
    <div class="navbar navbar-expand-md">
    
        <a href="#" class="navbar-brand font-weight-bold text-white text-center">TSF BANK SYSTEM</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
        <span class="navbar-toggler-icon" style="background:white; border-radius:10px;"></span>
        </button>
    
        <div class="collapse navbar-collapse text-center" id="collapsenavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item">
                    <a href="customers.php" class="nav-link text-white">Customers</a></li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white"></a></li>  
            </ul>
        </div>
    </div>

    <div class="container">
        <h1 style="margin-top:150px;">Welcome to the Bank!</h1>
        <h4>We are at your service.</h4>
        <a href="customers.php">Go to Customers Details -></a>
    </div>

</div>
</body>
</html>