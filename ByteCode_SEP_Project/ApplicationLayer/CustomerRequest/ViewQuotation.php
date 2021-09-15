<?php include '../../src/navbar1.php';?>
<?php
    require_once '../../BusinessServiceLayer/controller/CustomerRequestController.php';

    $Cus_ID = $_GET['Cus_ID'];

    $req = new ManageCustomerRequestController();
    $data = $req->CviewQuote();
    /* if(isset($_POST['pay'])){
    $req->payment($Quotation_ID); 
    } */

    
?>
<html>
    <head>
        <title>Your Quotation</title>
        
    </head>
    <style>
        
        th, td {
        padding: 5px;
        vertical-align: top;
        text-align: left;
        border:1px solid black;    
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
            width:100px;
            font-family:Times New Roman;
        }
    </style>
    
   
    
    <body>
    <br>
        <br>
        <!--To show Company Details-->
        <table>
        <tr>
        <td>DERCS Computer Sdn Bhd <br> B-14, Lorong Pandan Damai, <br> 25150, Kuantan, Pahang
        <br><br>+601234567 <br> DERCSComputer@gmail.com</td></tr>
        </table>

        <form action="" method="POST" enctype="multipart/form-data">
                <?php foreach($data as $row) { 
                   $_SESSION['Quotation_ID']=$row['Quotation_ID'];
                ?>
        <!--To show customer details-->
        &nbsp;
        <table>
        <tr>
        <td>To:</td>
        <td><input type="text" name="CustName" value="<?=$row['CustName']?>" readonly><br>
        <input type="text" name="CustAddress" value="<?=$row['CustAddress']?>" readonly><br>
        <input type="text" name="CustPhone" value="<?=$row['CustPhoneNo']?>" readonly></td>
        </tr>
        </table>

        Quotation ID: <input type="text" name="Quotation_ID" value="<?=$row['Quotation_ID']?>" readonly>
        <br>
        Valid Until: 30/3/2021
        

        <!--To show device quotation and details-->
        
        <table style="border: 1px solid black;
            border-collapse: collapse;padding: 7px;
        vertical-align: top;text-align: left;">
        
        <thead>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price (RM)</th>
        <th>Decsription</th>
        <tr>
        <td><input type="text" name="ItemName" value="<?=$row['ItemName']?>" readonly></td>
        <td><input type="text" name="ItemQuantity" value="<?=$row['ItemQuantity']?>" readonly></td>
        <td><input type="text" name="ItemPrice" value="<?=$row['ItemPrice']?>" readonly></td>
        <td><input type="text" name="ItemDesc" value="<?=$row['ItemDesc']?>" readonly></td>
        <tr>
        <td colspan="2">Service Change</td>
        <td><input type="text" name="SErcharge" value="<?=$row['Sercharge']?>" readonly></td>
        <td></td>
        </tr>
        <tr >
        <td colspan="2">Total Price (RM) </td>
        <td colspan="2" ><input type="text" name="RepairPrice" value="<?=$row['RepairPrice']?>" readonly></td>
        </tr>
        </table>
        
        <br><br>Additional Notes: <input type="text" name="ItemNote" value="<?=$row['ItemNote']?>" readonly>

        <br><br>
        <button type="submit" name="Pay" value="Pay" class="Rbutton" disabled>Pay
       
        <button type="submit" name="Back" value="Back" class="Rbutton">Back
       
           
        </form>
        <?php } ?>
    
    </body>
    
</html>