<?php 
require_once '../../BusinessServiceLayer/controller/ItemUpdateController.php';

session_start();

$Quotation_ID = $_GET['Quotation_ID'];

$quotation = new ItemUpdateController();
$quotationdata = $quotation->quotationdata();

if(isset($_POST['done'])){
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
			body {
  				font-family: Arial, Helvetica, sans-serif;
			}
			.navbar {
			  overflow: hidden;
			  background-color: #333;
			}
			
			.navbar a {
			  float: left;
			  font-size: 16px;
			  color: white;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			}
			
			.dropdown {
			  float: left;
			  overflow: hidden;
			}
			
			.dropdown .dropbtn {
			  font-size: 16px;  
			  border: none;
			  outline: none;
			  color: white;
			  padding: 14px 16px;
			  background-color: inherit;
			  font-family: inherit;
			  margin: 0;
			}
			
			.navbar a:hover, .dropdown:hover .dropbtn {
			  background-color: red;
			}
			
			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #f9f9f9;
			  min-width: 160px;
			  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}
			
			.dropdown-content a {
			  float: none;
			  color: black;
			  padding: 12px 16px;
			  text-decoration: none;
			  display: block;
			  text-align: left;
			}
			
			.dropdown-content a:hover {
			  background-color: #ddd;
			}
			
			.dropdown:hover .dropdown-content {
			  display: block;
			}

			table {
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
	<div class="navbar">
  		<a href="../../ApplicationLayer/HomePage/staffHomePage.php?Staff_ID=<?=$Staff_ID?>">Home</a>
  		<a href="../../ApplicationLayer/ManageAccount/myaccount.php?AccType=staff&Staff_ID=<?=$Staff_ID?>">My Account</a>
  		<div class="dropdown">
    		<button class="dropbtn">Manage Account 
      		<i class="fa fa-caret-down"></i>
    		</button>
    		<div class="dropdown-content">
      			<a href="../../ApplicationLayer/ManageAccount/myaccount.php?AccType=staff&Staff_ID=<?=$Staff_ID?>">My Account</a>
      			<a href="../../ApplicationLayer/ManageAccount/managecustomer.php?action=list&Staff_ID=<?=$Staff_ID?>">Manage Customer</a>
      			<a href="../../ApplicationLayer/ManageAccount/managerider.php?action=list&Staff_ID=<?=$Staff_ID?>">Manage Rider</a>
    		</div>
  		</div> 
	</div>

		<!--    utk content    -->
		<div class="container-fluid content mb-5">
			<div class="col-lg-12 py-4" align="center">
				<div class="col-lg  form-style-6">
					<fieldset>
						
							<legend>
							<br><br>
								<h1>Edit Quotation Item</h1>
							</legend>
							<br>
                            <center>
                            <?php 
							    foreach ($quotationdata as $row) {
							?>
                            <h3>Quotation ID: <?php echo $row['Quotation_ID']; ?><</h3>
                            <form action="" method="post">
							    <table class="table " style="font-size: 15px; ">
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
                                            <h3>Address: <?php echo $row['CustAdress']; ?></h3>
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
                                        <td><h3>Item Details
                                            <?php if($row['RepairStatus']=="Pending"){
												?>
												<select name="RepairStatus">
                                    				<option value="Pending" selected>Pending</option>
                                    				<option value="On progress" >On Progress</option>
                                                    <option value="Repaired" >Repaired</option>
                                				</select>
                                            <?php 
											}elseif($row['RepairStatus']=="On Progress"){
												?>
												<select name="RepairStatus">
                                                    <option value="Pending" >Pending</option>
                                    				<option value="On progress" selected>On Progress</option>
                                                    <option value="Repaired" >Repaired</option>
                                				</select>
											<?php }elseif($row['RepairStatus']=="Repaired"){
												?>
												<select name="RepairStatus">
                                                    <option value="Pending" >Pending</option>
                                    				<option value="On progress" >On Progress</option>
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
                                            Damage: <?php echo $row['DveviceDamage']; ?>
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