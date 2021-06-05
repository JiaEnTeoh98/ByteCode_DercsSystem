<?php
    require_once '../../BusinessServiceLayer/Controller/PickupandDeliveryController.php';
    

    session_start();

    $Cus_ID = $_GET['Cus_ID'];

    $req = new PickupandDeliveryController();
    $data = $req->CviewAllPickupStat($Cus_ID);

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CUSTOMER PICKUP STATUS LIST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>

        table thead#ROW1 {background-color:E5E5FC;}

             th, td {
        padding: 5px;
        vertical-align: top;
        text-align: left;
        border:1px solid black;    
        }

        

        .Rbutton{
            background-color:#279EFC ;
            color:white;
            border-radius:4px;
            border-width:1px;
            height:25px;
            width:100px;
            font-family:Times New Roman;
        }
        </style>
    </head>
    <body>
        
        
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">CUSTOMER PICKUP STATUS LIST</h3>
        <br><br>

                <p>This is your pickup status</p>
                <table border="1">
                <thead id="ROW1">
                
                    <th>Quotation ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Status</th>
                
                    <?php foreach($data as $row){ ?>
                    <tr>
                        
                        <td><?=$row['Quotation_ID']?></td>
                        <td><?=$row['ServiceType']?></td>
                        <td><?=$row['CustAddress']?></td>
                        <td><?=$row['TrackPickup']?></td>
                        </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
           
        </center>
    </body>
</html>
