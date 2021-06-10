<?php include '../../src/navbar.php';?>
<?php 
require_once '../../BusinessServiceLayer/controller/ItemUpdateController.php';


$Quotation_ID = $_GET['Quotation_ID'];

$quotation = new ItemUpdateController();
$quotationdata = $quotation->quotationdata($Quotation_ID);



if(isset($_POST['done'])){
	$Quotation_ID=$_POST['Quotation_ID'];

    $quotationupdate = $quotation->quotationupdate($Quotation_ID);
}
		
?>
<!DOCTYPE html>
	<html>
	<head>
    
		<title>DERCS | CUSTOMER ACCOUNT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<style>

			.table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 50%;
			}
			
			td, th {
				border: 1px solid black;
				padding: 18px;
			}

			th {
				background-color: #C3E4F6;
				text-align: center;
				width: 250px;
			}

			.button {
  				background-color: #4BB1C8;
  				border: none;
  				color: white;
  				padding: 10px 25px;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
 				margin: 2px 2px;
  				cursor: pointer;
			}

		</style>
	</head>

	<body>	

		<!--    utk content    -->

						
							<legend><center>
							<br><br>
								<h1>Edit Quotation Item</h1>
								</center>
							</legend>
							<br>
                            
                            <?php 
							    foreach ($quotationdata as $row) {
							?>
                            <center>
                           <form action="" method="post">
							    <table class="table " style="font-size: 16px; ">
								
									 <tr colspan="2">
									 <strong>Quotation ID: <?php echo $row['Quotation_ID']; ?><strong>
									 <tr>
									 <tr>
										<th style="width: 30%;">
											<h3>Customer Information</h3>
										</th >
										<th >
											<h3>Update Item Status</h3>
										</th >
                                    </tr>
                                    <tr>
                                        <td rowspan="2">

                                            <h3>Name:    <?php echo $row['CustName']; ?></h3>
                                            <h3>Phone:   <?php echo $row['CustPhoneNo']; ?></h3>
                                            <h3>Address: <?php echo $row['CustAddress']; ?></h3>

                                            Name:    <?php echo $row['CustName']; ?><br>
                                            Phone:   <?php echo $row['CustPhoneNo']; ?><br>
                                            Address: <?php echo $row['CustAddress']; ?><br>


                                            Name:    <?php echo $row['CustName']; ?><br>
                                            Phone:   <?php echo $row['CustPhoneNo']; ?><br>
                                            Address: <?php echo $row['CustAddress']; ?><br>


                                            Name:    <?php echo $row['CustName']; ?><br>
                                            Phone:   <?php echo $row['CustPhoneNo']; ?><br>
                                            Address: <?php echo $row['CustAddress']; ?><br>

										</td>
										<td>
											<h3>Item Status 
                                            <?php if($row['PickupStatus']=="Pending"){
												?>
												<select name="PickupStatus">
                                    				<option value="Pending" selected>Pending pickup by rider</option>
                                    				<option value="Picked up" >Picked up by rider</option>
                                				</select>
                                            <?php 
											}elseif($row['PickupStatus']=="Picked up"){
												?>
												<select name="PickupStatus">
                                                <option value="Pending" >Pending pickup by rider</option>
                                    				<option value="Picked up" selected>Picked up by rider</option>
                                				</select>
											<?php } ?></h3>
										</td>
									</tr>
                                    <tr>
                                        <td><h3>Item Details:
                                            <?php if($row['RepairStatus']=="Pending"){
												?>
												<select name="RepairStatus">
                                    				<option value="Pending" selected>Pending</option>
                                    				<option value="OnProgress" >On Progress</option>
                                                    <option value="Repaired" >Repaired</option>
                                				</select>
                                            <?php 
											}elseif($row['RepairStatus']=="OnProgress"){
												?>
												<select name="RepairStatus">
                                                    <option value="Pending" >Pending</option>
                                    				<option value="OnProgress" selected>On Progress</option>
                                                    <option value="Repaired" >Repaired</option>
                                				</select>
											<?php }elseif($row['RepairStatus']=="Repaired"){
												?>
												<select name="RepairStatus">
                                                    <option value="Pending" >Pending</option>
                                    				<option value="OnProgress" >On Progress</option>
                                                    <option value="Repaired" selected>Repaired</option>
                                				</select>
											<?php } ?></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <h3>Device Information</h3>
                                        </td>
                                        <td>
                                        Repairing Cost <input type="text" name="RepairPrice"  class="form-control input-lg col-xs-4" value="<?php echo $row['RepairPrice']; ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Model: <?php echo $row['DeviceModel']; ?>
                                            Color: <?php echo $row['DeviceColor']; ?>
                                            Symptom: <?php echo $row['DeviceSymptom']; ?>
                                            Damage: <?php echo $row['DeviceDamage']; ?>
                                        </td>
                                        <td>
                                            <input type="hidden" name="Quotation_ID" value="<?php echo $row['Quotation_ID']; ?>" hidden>
											<button type="submit" name="done" class="button">Done</button>
											<button type="submit" class="button" formaction="../../ApplicationLayer/ManageItemRepairingStatus/managequotation.php?Quotation_ID=<?=$row['Quotation_ID']?>" onclick="return confirm('Confirm cancel update?')">Cancel Update</a>
                                        </td>
                                    </tr>								
                                </table>
                            </form>
                               <?php 
								
								}?> 
                                <center>
						
					</fieldset>
				</div>

			</div>

		</div>

		<!--     tamat utk content   -------------------- -->
	</body>