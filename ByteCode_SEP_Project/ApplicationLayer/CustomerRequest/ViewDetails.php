<?php
     require_once '../../BusinessServiceLayer/Controller/CustomerRequestController.php';
    

    $Quotation_ID = $_GET['Quotation_ID'];

    $req = new ManageCustomerRequestController();
    $data = $req->viewSpeQuote($Quotation_ID); 

    if(isset($_POST['accept'])){
        $req->acceptQuote();
    }

    if(isset($_POST['reject'])){
        $req->rejectQuote();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer and Quotation Details</title>
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
        border:1px solid black;    
        }


        .rbutton{
            background-color:#279EFC ;
            color:black;
            border-color:#C9CCC8;
            border-width:1px;
            height:25px;
            width:100px;
            font-family:Times New Roman;
        }
        </style>
    </head>
    <body>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Customer Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
            <form action="" method="POST">
                <?php foreach($data as $row) { 
                   $_SESSION['Quotation_ID']=$row['Quotation_ID'];
                ?>
                <table>
                    <tr>
                        <td>Name:&emsp;</td>
                        <td><input type="text" name="CustName" value="<?=$row['CustName']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Phone Number:&emsp;&emsp;</td>
                        <td><input type="text" name="CustPhoneNo" value="<?=$row['CustPhoneNo']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="CustAddress" value="<?=$row['CustAddress']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Device Model:</td>
                        <td><input type="text" name="DeviceModel" value="<?=$row['DeviceModel']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Device Color:</td>
                        <td><input type="text" name="DeviceColor" value="<?=$row['DeviceColor']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Device Symptom:</td>
                        <td><input type="text" name="DeviceSymptom" value="<?=$row['DeviceSymptom']?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Device Damage:</td>
                        <td><input type="text" name="DeviceDamage" value="<?=$row['DeviceDamage']?>" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                        <br>
                            <button type="submit" name="accept" class="rbutton">Accept</button>&emsp;
                            <button type="submit"  name="reject" class="rbutton">Reject</button>
                        </td>
                    </tr>
                </table>
                <?php } ?>             
            </form>
        </div>
    </center>
    </body>
</html>