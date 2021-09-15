<?php include '../../src/navbar1.php';?>
<?php
    require_once '../../BusinessServiceLayer/Controller/PickupandDeliveryController.php';
    

    session_start();

?>


<html>
    <head>
        <title>Customer Menu</title>
        
    </head>
    <style>
        div {text-align: center;}
        

        .button{
            background-color:E5E5FC ;
            color:black;
            border-color:C7C7C7;
            border-width:1px;
            height:45px;
            width:280px;
            font-family:Verdana;
            font-size: 30px;
        }
    </style>
    
   
    
    <body>
    <br>
        <!--For Customer to navigate to CustomerDeliveryStatusList or CustomerPickupStatusList-->
        <br><br><br><br><br><br>
        <div>
        <p style="font-size:27px;">Please choose the service to view status：</p>
        <br><br>
        <i style="font-size:24px;background-color:#279EFC" type="button" onclick="location.href='CustPickupStatusList.php?Cus_ID=<?=$row['Cus_ID']?>'">Pickup Service</i>
        <br><br><br><br>
        <i style="font-size:24px;background-color:#279EFC" type="button" onclick="location.href='CustPickupStatusList.php?Cus_ID=<?=$row['Cus_ID']?>'">Delivery Service</i>
        
        
        </div>
       
    
    </body>
    
</html>