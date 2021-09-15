<?php include '../../src/navbar1.php';?>
<?php
    require_once '../../BusinessServiceLayer/Controller/PickupandDeliveryController.php';
    

    session_start();

    $req = new PickupandDeliveryController();
    $data = $req->RviewAllPickupQuote();

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RIDER PICKUP LIST</title>
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
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">RIDER PICKUP LIST</h3>
        <br><br>


                <table border="1">
                <thead id="ROW1">
                    <th>Quotation ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                
                    <?php foreach($data as $row){ ?>
                    <tr>
                        
                        <td><?=$row['Quotation_ID']?></td>
                        <td><?=$row['CustName']?></td>
                        <td><?=$row['CustAddress']?></td>
                        <form action="" method="POST">
                            
                            <td><i style="font-size:20px;background-color:#BCBDFD" type="button" onclick="location.href='RiderPickupStatus.php?Quotation_ID=<?=$row['Quotation_ID']?>'">Access</i>
                            <!--<button name="ViewDetails" value="ViewDetails" class="Rbutton" onclick="location.href='ViewDetails.php?Quotation_ID=<?=$row['Quotation_ID']?>'">View Details</button></td>-->
                            </td>
                        </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
           
        </center>
    </body>
</html>
