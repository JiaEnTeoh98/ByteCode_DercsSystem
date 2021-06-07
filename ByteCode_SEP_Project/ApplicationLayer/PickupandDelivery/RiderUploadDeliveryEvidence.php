<?php
     require_once '../../BusinessServiceLayer/Controller/PickupandDeliveryController.php';
    

    $Quotation_ID = $_GET['Quotation_ID'];

    $req = new PickupandDeliveryController();
    $data = $req->viewSpeDel($Quotation_ID); 

    if(isset($_POST['upload'])){
        $req->DelEvidence();
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rider Upload Delivery Evidence</title>
        
        <script>
            var loadFile = function(event){
                var image = document.getElementById('imageOut');
                image.src = URL.createObjectURL(event.target.files[0]);
            };

            function displayFile(){
                var x = document.getElementById("DeliveryEvidence").files[0];
                var y = x.name;

                document.myForm.imagename.value = y;
            }
        </script>

<script>
            var loadFilee = function(event){
                var image = document.getElementById('imageOut');
                image.src = URL.createObjectURL(event.target.files[0]);
            };

            function displayFilee(){
                var x = document.getElementById("CODEvidence").files[0];
                var y = x.name;

                document.myForm.imagenama.value = y;
            }
        </script>
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

        .button{
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
    <h1>Delivery Information</h2>
        <br>
        <center>
        <!--Rider need to upload delivery evidence-->
        <table style="border: 1px solid back;
            border-collapse: collapse;padding: 7px;
        vertical-align: top;text-align: left;">
        <form name="myForm" action="" method="POST" enctype="multipart/form-data">
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

        <tr rowspan="2">
        <td>Address:</td>
        <td><input type="text" name="CustAddress" value="<?=$row['CustAddress']?>" readonly></td>
        
        
        <td>
         <input type="button" value="Select File" onclick="document.getElementById('DeliveryEvidence').click()">
         <input type="file" id="DeliveryEvidence" name="DeliveryEvidence" accept="image/*" onchange="loadFile(event)" style="display: none">
          &emsp;&emsp;
         
        <input type="text" name="imagename" placeholder="Photo.png" size="15">&emsp;&emsp;</td>
        <td><input type="button" value="Upload Photo" accept="image/*" onclick="displayFile()" onchange="loadFile(event)"></td>
        
        <tr>
        <td colspan="2">
        <td>
         <input type="button" value="Select File" onclick="document.getElementById('CODEvidence').click()">
         <input type="file" id="CODEvidence" name="CODEvidence" accept="image/*" onchange="loadFilee(event)" style="display: none">
          &emsp;&emsp;
        <input type="text" name="imagenama" placeholder="Photo.png" size="15">&emsp;&emsp;</td>
        <td><input type="button" value="Upload Photo" accept="image/*" onclick="displayFilee()" onchange="loadFilee(event)"></td>

        <tr>
         
         <td colspan="4"><input type="hidden" name="Quotation_ID" value="<?=$row['Quotation_ID']?>">
         <button type="submit" name="upload" >Upload</button></td>
    
         <tr>
         <?php } ?>  
        </form>
        
        </tr>
        
       
        </table>
        
      
       </div>
      
    </body>
    </center>
    
</html>