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
        <input type="button" onclick="window.location.href='CustPickupStatusList.php';" class="button" value="Pickup Service"/>
        <br><br><br><br>
        <input type="button" onclick="window.location.href='CustDeliveryStatusList.php';" class="button" value="Delivery Service"/>
        
        
        </div>
       
    
    </body>
    
</html>