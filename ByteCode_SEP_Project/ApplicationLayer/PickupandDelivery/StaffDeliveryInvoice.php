<?php include '../../src/navbar1.php';?>
<?php
     require_once '../../BusinessServiceLayer/Controller/PickupandDeliveryController.php';
    

    $Quotation_ID = $_GET['Quotation_ID'];

    $req = new PickupandDeliveryController();
    $data = $req->viewSpeDel($Quotation_ID); 

    
?>

<html>
    <head>
        <title>Rider Delivery Customer Information</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        
    </head>
    <style>

div {text-align: center;}
        table td#ROW1 {background-color:BCBDFD;}
        table td#ROW2 {background-color:E5E5FC;}
        th, td {
        padding: 5px;
        vertical-align: top;
        text-align: left;
        border:1px solid black;    
        }

        .abutton{
            background-color:#E5E5FC ;
            color:black;
            border-color:#C9CCC8;
            border-width:1px;
            height:25px;
            width:100px;
            font-family:Times New Roman;
        }

        
    </style>
    
   
    
    <body>
    <div>
    <br>
    <h1>Pickup Information</h2>
        <br>
        <center>
        <!--To show customer information for delivery-->
        <!--Rider need to click on accept or reject button-->
        <table style="border: 1px solid back;
            border-collapse: collapse;padding: 7px;
        vertical-align: top;text-align: left;">
        <form action="" method="POST" enctype="multipart/form-data">
        <?php foreach($data as $row) { 
                   $_SESSION['Quotation_ID']=$row['Quotation_ID'];
                ?>
        <tr>
        <td colspan="2"; id="ROW1">Delivery Information</td>
        <td>Quotation ID: </td>
        <td><input type="text" name="Quotation_ID" value="<?=$row['Quotation_ID']?>" readonly></td>
        </tr>

        <tr>
        <td colspan="2"; id="ROW2"> Customer Information</td>
        <td colspan="2"; id="ROW2"> Device Information</td>
        </tr>

        <tr>
        <td>Name:</td>
        <td><input type="text" name="CustName" value="<?=$row['CustName']?>" readonly></td>
        <td>Model:</td>
        <td><input type="text" name="DeviceModel" value="<?=$row['DeviceModel']?>" readonly></td>
        </tr>

        <tr>
        <td>H/P NO:</td>
        <td><input type="text" name="CustPhoneNo" value="<?=$row['CustPhoneNo']?>" readonly></td>
        <td>Color</td>
        <td><input type="text" name="DeviceColor" value="<?=$row['DeviceColor']?>" readonly></td>
        </tr>

        <tr>
        <td>Address:</td>
        <td><input type="text" name="CustAddress" value="<?=$row['CustAddress']?>" readonly></td>
        
        <input type="hidden" name="Quotation_ID" value="<?=$row['Quotation_ID']?>">
        <td colspan="2"><button type="submit" id="PrintButton" name="print" class="abutton" onclick="PrintPage()">Print
        
        </tr>
        
       
        </table>
        <?php } ?>             
        </form>
    
       
       </div>
    </body>
    <script src="bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
	function PrintPage() {
		window.print();

        window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
	}
    </script>
    
    </center>
</html>