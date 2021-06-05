<html>
    <head>
        <title>Staff Menu</title>
        
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
        <!--For Customer to navigate to StaffDeliveryList or StaffPickupList-->
        <br><br><br><br><br><br>
        <div>
        <p style="font-size:27px;">Please choose service for printing of invoice：</p>
        <input type="button" onclick="window.location.href='StaffPickupList.php';" class="button" value="Manage Pickup"/>
        <br><br><br><br>
        <input type="button" onclick="window.location.href='StaffDeliveryList.php';" class="button" value="Manage Delivery"/>
        
        
        </div>
       
    
    </body>
    
</html>