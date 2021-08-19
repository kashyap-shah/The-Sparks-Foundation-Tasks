<html>
<head>
<title>TSF BANK SYSTEM | USERS</title>
<link rel="icon" href="images/icon.png">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    .display_table
    {
        width:100vw;
        height:80vh;
        display:flex;
        flex-direction:column;
        justify-content: center;
        text-align:center;
    }
    h1
    {
        font-size:18px;
        color:#000;
        text-align:center;
        margin-top:-20px;
        margin-bottom:20px;
    }
    table
    {
        border:2px solid #000;
        background-color:#fff;
        font-weight:bold;
        margin:auto;
    }
    th,td
    {
        border:1px solid #000 ;
        padding:8px 30px;
        text-align:center;
        color:#000 ; 
    }
    th
    {
        text-transform:uppercase;
        font-weight:500;
    }
    td
    {
        font-size:13px;
    }
</style>
</head>

<body>
<div class="main_div">
 
    <div class="navbar navbar-expand-md">
        
        <a href="index.php" class="navbar-brand font-weight-bold text-white text-center">TSF BANK SYSTEM</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
        <span class="navbar-toggler-icon" style="background:white; border-radius:10px;"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="collapsenavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item">
                    <a href="users.php" class="nav-link text-white">Users</a></li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white"></a></li>  
            </ul>
        </div>
    </div>
    
    <div class="display_table">
        <h1>User Details</h1>
        <div class="center_div">
            <div class="table-responsive">
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th colspan="2">Do Transaction</th>
                    </tr>
                </thead>
                <tbody>
            </div>

        <?php
            include 'connection.php';
            $selectquery = " select * from banksystem";
            $query = mysqli_query($con,$selectquery);
            $numofrows = mysqli_num_rows($query);

           while($res = mysqli_fetch_array($query))
            {
        ?>
                    <tr>
                        <td><?php  echo $res['ID']; ?></td>
                        <td><?php echo $res['Name']; ?></td>
                        <td><?php echo $res['Email']; ?></td>
                        <td><?php echo $res['Amount']; ?></td>
                        <td><a href="transaction.php?idtransfer=<?php  echo $res['ID']; ?>" ><i class=" fa fa-user-circle" aria-hidden="true""></i></a></td>
                        </tr>
        <?php
            }
        ?>
                </tbody>
                </table>
        </div>

    </div>

</div>
</body>
</html>


    



















