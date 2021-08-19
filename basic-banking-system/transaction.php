<html>
<head>
<title>TSF BANK SYSTEM | TRANSACTION PAGE</title>
<link rel="icon" href="images/icon.png">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    body
    {
        background-image:url("images/bgImage.jpg");
        background-size:cover; v
    }
    .navbar
    {
        width:100%;
        background-color: #000;
    }
    .main_div
    {
        width:100%;
    }
    input
    {
        margin-top:10px;
        width:100%;
        height:40px;
        border-radius:5px;
        outline:none;
    }
    button
    {
        color:#fff;
        background:#A80000;
        border: 2px solid #fff;
        padding: 14px 20px;
        cursor: pointer;
        width: 100%;
    }
    button:hover
    {
        color:#fff;
        background:#4CAF50;
        border-color:#000;
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
                    <a href="customers.php" class="nav-link text-white">Customers</a></li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white"></a></li>  
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="margin:26px;background-color:#808080;color:white" >
                    <form method="POST">                            
                    <?php
                        include 'connection.php';
                        $ids=$_GET['idtransfer'];
                        $showquery="select * from `customers` where ID=($ids) ";
                        $showdata=mysqli_query($con,$showquery);
                        if (!$showdata) {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                        }
                        $arrdata=mysqli_fetch_array($showdata);
                    ?>
                    <div class="card-body"> 
                        <h3 class="text-center">Transfer From:</h3>
                        <label>Name: </label>
                        <input type="text"  name="name1" value="<?php echo $arrdata['Name']; ?>" required placeholder="Enter Your Yame"/><br><br>
                        <label>Email: </label>
                        <input type="text" name="email1" value="<?php echo $arrdata['Email']; ?>" required placeholder="Enter Email ID"/><br><br>
                        <label>Amount: </label>
                        <input type="text" name="amount1" value="" style="width:210px;" required placeholder="Enter Amount"/><br><br>

                        <h3 class="text-center">Transfer To:</h3>
                        <label>Name: </label>
                        <input type="text"  name="name2" value="" required placeholder="Enter User Name"/><br><br>
                        <label>Email: </label>
                        <input type="text" name="email2" value="" required placeholder="Enter Email ID"/><br><br>

                        <button  name="submit">Proceed to Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php

    include 'connection.php';

    if(isset($_POST['submit']))
    {
        $Sender_name=$_POST['name1'];
        $Sender_email=$_POST['email1'];
        $Sender=$_POST['amount1'];
        $Receiver_name=$_POST['name2'];
        $Receiver_email=$_POST['email2'];
        
        $ids=$_GET['idtransfer'];
        $senderquery="select * from `customers` where ID=$ids ";
        $senderdata=mysqli_query($con,$senderquery);
    
        if (!$senderdata) 
        {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $arrdata=mysqli_fetch_array($senderdata);

        //receiverquery
        $receiverquery="select * from `customers` where Email='$Receiver_email' ";
        $receiver_data=mysqli_query($con,$receiverquery);
    
        if (!$receiver_data) 
        {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $receiver_arr=mysqli_fetch_array($receiver_data);
        $id_receiver=$receiver_arr['ID'];

        if($arrdata['Amount'] >= $Sender)
        {
            $decrease_sender=$arrdata['Amount'] - $Sender;
            $increase_receiver=$receiver_arr['Amount'] + $Sender;
            $query="UPDATE `customers` SET `ID`=$ids,`Amount`= $decrease_sender  where `ID`=$ids ";
            $rec_query="UPDATE`customers` SET `ID`=$id_receiver,`Amount`= $increase_receiver where  `ID`=$id_receiver ";
            $res= mysqli_query($con,$query);
            $rec_res= mysqli_query($con,$rec_query);
            $tra_query="INSERT INTO `transactions`(`Transfer_From`, `Transfer_To`, `Amount_Transfered`) VALUES ('$Sender_name','$Receiver_name','$Sender')";
            $tra= mysqli_query($con,$tra_query);
            if($res && $rec_res)
            {
?>
                <script>
                parent._alert = new parent.Function("alert(arguments[0]);");
                parent._alert('Transaction Successfull!');
                </script> 
        
<?php
            }
            else
            {
?>
                <script>
                parent._alert = new parent.Function("alert(arguments[0]);");
                parent._alert('Error!');
                </script> 

<?php
            }
        }
        else
        {
?>
            <script>
            parent._alert = new parent.Function("alert(arguments[0]);");
                parent._alert('Insufficient Balance!');
            </script> 
<?php
        }
    }
?>
</body>
</html>