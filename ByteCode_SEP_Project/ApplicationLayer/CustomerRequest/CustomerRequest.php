<?php
    require_once '../../BusinessServiceLayer/controller/CustomerRequestController.php';

    session_start();

    $req = new ManageCustomerRequestController();
    

    if(isset($_POST['requestQ'])){
        $req->RequestQuote();
    }

    if(isset($_POST['viewQ'])){
        $req->CViewQuote();
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Request Quotation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        
        <style>
             th, td {
        padding: 5px;
        vertical-align: top;
        text-align: left;
        border:1px white;    
        }

        .Vbutton{
            background-color:#E2E6E6;
            color:black;
            border-radius:4px;
            border-width:1px;
            height:25px;
            width:150px;
            font-family:Times New Roman;
        }

        .Rbutton{
            background-color:#279EFC ;
            color:white;
            border-radius:4px;
            border-width:1px;
            height:25px;
            width:150px;
            font-family:Times New Roman;
        }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="./ViewQuotation.php?Cus_ID=<?=$_SESSION['Cus_ID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>

            <!-- <div class="topnav-right">
                <a href="../manageUserProfile/serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div> -->
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">CUSTOMER REQUEST</h3>
        <br><br>

    
        <br>
        <form action="" method="post" enctype="multipart/form-data">
        <table style="border: 1px white;
            border-collapse: collapse;padding: 7px;
        vertical-align: top;
        text-align: left;">
        
        <tr>
            <td>Model</td>
            <td>:</td>
            <td><input type="text" name="DeviceModel" placeholder="Device Model" required></td>
        </tr> 
        <tr>
            <td>Color</td>
            <td>:</td>
            <td><input type="text" name="DeviceColor" placeholder="Device Color" required></td>
        </tr>
        <tr>
            <td>Symptom</td>
            <td>:</td>
            <td><input type="text" name="DeviceSymptom" placeholder="Device Symptom" required></td>
        </tr>
        <tr>
            <td>Damage</td>
            <td>:</td>
            <td><input type="text" name="DeviceDamage" placeholder="Device Damage" required></td>
        </tr>
        <tr>
            <td>Date Request</td>
            <td>:</td>
            <td><input type="date" name="DateRequest" placeholder="Date Request" required></td>
        </tr>
        </table>
        <table>
        </form>
        <tr>
        <td>
        
        <form action="" method="POST">
        <i style="font-size:24px;background-color:#279EFC" type="button" onclick="location.href='ViewQuotation.php'">View Quotation</i>
        </td>
        <td><button type="submit" name="requestQ" value="requestQ" class="Rbutton">Request Quotation
        </td>
        <td><button type="submit" name="Cancel" value="Cancel" class="Rbutton">Cancel
        </td>
        

       </form>
       

    </center> 
    </body>
</html>
