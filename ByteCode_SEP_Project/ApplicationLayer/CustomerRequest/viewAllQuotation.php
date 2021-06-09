<?php include '../../src/navbar1.php';?>
<?php
    require_once '../../BusinessServiceLayer/Controller/CustomerRequestController.php';

    session_start();

    $req = new ManageCustomerRequestController();
    $data = $req->viewAll();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer View Quotation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: center;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotocart {
                position: fixed;
                right: 25px;
                bottom: 15px;
                background-color: red;
                border-radius: 50%;
            }

            input {
                text-align: center;
            }
        </style>
    </head>
    <body>

        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Customer View Food Service</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table border="1">
                    <tr>
                        <td width="150"><center><b>Device Model</b></center></td>
                        <td width="150" ><center><b>Device Color</b></center></td>
                        <td width="130"><center><b>Device Damage</b></center></td>
                        <td width="100"><center><b>Device Symptom</b></center></td>
                        <td colspan="2" width="100"><center><b>Action</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <form action="" method="POST">
                    <tr>
                    
                        <td><input type="text" name="DeviceModel" value="<?=$row['DeviceModel']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceColor" value="<?=$row['DeviceColor']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceDamage" value="<?=$row['DeviceDamage']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceSymptom" value="<?=$row['DeviceSymptom']?>" class="noborder" readonly></td>
                        <td style="text-align: center;">
                            <input type="hidden" name="Quotation_ID" value="<?=$row['Quotation_ID']?>">
                            <input type="button" onclick="location.href='../PaymentInterface/PaymentInterface.php?Quotation_ID=<?=$row['Quotation_ID']?>'" value="Pay">
                        </td>

                        

                    </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
    </center> 
    </body>
</html>