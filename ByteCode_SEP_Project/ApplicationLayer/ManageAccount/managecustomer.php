
<?php 
require_once '../../BusinessServiceLayer/controller/ManageAccountController.php';

session_start();
$Staff_ID = $_GET['Staff_ID'];
$action = $_GET['action'];
if($action=='list'){
	//
	$customer = new ManageAccountController();
	$custlist = $customer->custlist();
}elseif($action=='view'){
	$Cus_ID = $_GET['Cus_ID'];
	$customer = new ManageAccountController();
	$custview = $customer->custview($Cus_ID);
}elseif($action=='edit'){
	$Cus_ID = $_GET['Cus_ID'];
	$customer = new ManageAccountController();
	$custview = $customer->custview($Cus_ID);
}

if(isset($_POST['custview'])){
	$custview = $customer->custview($Cus_ID);
}

//click save button
if(isset($_POST['SaveUpdate'])){
	$Cus_ID = $_POST['Cus_ID'];
	$customer = new ManageAccountController();
	$custedit = $customer->updatecustdata($Cus_ID);
}

//click ban button
if(isset($_POST['updateStatus'])){
	$customer = new ManageAccountController();
	$updateStat = $customer->updatecustStatus($Cus_ID);
}

//click delete button
if(isset($_POST['deleteCust'])){
	$customer = new ManageAccountController();
	$deleteCust = $customer->deleteCust($Cus_ID);
}
		
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>STAFF | DERCS</title>
		<style type="text/css">

			.table{
				width: 65%;
				font-family: calibri, sans-serif;
				border-collapse: collapse;
				margin-left: auto;
				margin-right: auto;

			}

			td, th {
				border: 1px solid black;
				padding: 12px;
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
  				padding: 5px 13px;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
 				margin: 2px 2px;
  				cursor: pointer;
			}

			.Edit {
  				background-color: #48C9B0;
  				border: none;
  				color: white;
  				padding: 5px 13px;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
 				margin: 2px 2px;
  				cursor: pointer;
			}

            .Ban {
  				background-color: #F4D03F;
  				border: none;
  				color: white;
  				padding: 5px 13px;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
 				margin: 2px 2px;
  				cursor: pointer;
			}

            .Delete {
  				background-color: #E74C3C;
  				border: none;
  				color: white;
  				padding: 5px 13px;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
 				margin: 2px 2px;
  				cursor: pointer;
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

			input[type=text], select {
			  width: 100%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
			  font-size:15px;
			}

			input[type=submit]:hover {
			  background-color: #45a049;
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
		<div class="container-fluid content mb-5">
			<div class="col-lg-12 py-4" align="center">
				<div class="col-lg  form-style-6">
					<fieldset>
						<legend>
							<h1><strong>Customer Account</strong></h1>
						</legend>
						<?php 
						    if($action=="list"){
						?>
							<table class="table " style="font-size: 15px; ">

								<thead >
									<tr>
										<th style="width: 30px;">
											<h3>No</h3>
										</th >
										<th >
											<h3>Name</h3>
										</th >
                                        <th style="width: 20%;">
											<h3>Email</h3>
										</th >
										<th >
											<h3>Account Status</h3>
										</th >
										<th style="width: 30%;">
											<h3>Action</h3>
										</th >
									</tr>

								</thead>

								<?php 
								$i=0;
								foreach ($custlist as $row) {
								$i++;
								?>
								<tr>
									<td style="text-align: center;">
										
										<?php echo $i; ?>
									</td>
									<td style="padding-left: 15px;">
										<?php echo $row['CustName']; ?>
										
									</td>
                                    <td style="padding-left: 15px;">
										<?php echo $row['CustEmail']; ?>
										
									</td>
									<td>
										<form action="" method="POST">
										<center>
										<?php 
											if($row['CustAccStatus']=="Active"){
												?>
												<select name="CustAccStatus">
                                    				<option value="Active" selected>Active</option>
                                    				<option value="Banned" >Banned</option>
                                				</select>
                                            <?php 
											}elseif($row['CustAccStatus']=="Banned"){
												?>
												<select name="CustAccStatus">
                                    				<option value="Active" >Active</option>
                                    				<option value="Banned" selected>Banned</option>
                                				</select>
											<?php } ?>
											<input type="hidden" name="Cus_ID" value="<?php echo $row['Cus_ID']; ?>" hidden>
											<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
											<button type="submit" class="Edit" name="updateStatus" onclick="return confirm('Confirm update account status for selected customer?')">Update</a>
										</center>	
										</form>
									</td>
									<td style="text-align: center;">
										<form action="" method="POST">
											<input type="hidden" name="Cus_ID" value="<?php echo $row['Cus_ID']; ?>" hidden>
											<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
											<button type="submit" formaction="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?=$Staff_ID?>&action=view&Cus_ID=<?=$row['Cus_ID']?>" class="button">View</button>
											<button type="submit" formaction="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?=$Staff_ID?>&action=edit&Cus_ID=<?=$row['Cus_ID']?>" class="Ban">Edit</button>
											<!--<button href="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?php echo $Staff_ID;?>&action=delete&Cus_ID=<?php echo $row['Cus_ID'];?>" class="Delete">Delete</a>-->
											
											<button type="submit" class="Delete" name="deleteCust" onclick="return confirm('Confirm update account status for selected customer?')">Delete</a>
										</form>
									</td>
								</tr>
								<?php 
								
								}?>
                            </table>

						<?php
                                

						    }elseif($action=="view"){
                                foreach ($custview as $row) {
                                    $Cus_ID=$row['Cus_ID'];
						?>

                                <table class="table">
									<input type="hidden" name="Cus_ID" value="<?php echo $row['Cus_ID']; ?>" >
									<tr>
										<th>
											<h3>Name</h3>
										</th>
										<td>
											<?php echo $row['CustName']; ?>
										</td>
									</tr>
									<tr>
										<th>
											<h3>Username</h3>
										</th>
										<td>
											<?php echo $row['CustUName']; ?>
										</td>
									</tr>
									
									<tr>
										<th>
											<h3>Email</h3>
										</th>
										<td>
											<?php echo $row['CustEmail']; ?>
										</td>
									</tr>
									<tr>
										<th>
											<h3>Phone Number</h3>
										</th>
										<td>
											<?php echo $row['CustPhoneNo']; ?>
										</td>
									</tr>


									<tr>
										<th>
											<h3>Address</h3>
										</th>
										<td>
											<?php echo $row['CustAddress']; ?>

										</td>
									</tr>
                                    <tr>
										<th>
											<h3>Account Status</h3>
										</th>
										<td>
											<?php echo $row['CustAccStatus']; ?>
										</td>
									</tr>
								</table>
								<br>
								<a href="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?php echo $Staff_ID?>&action=edit&Cus_ID=<?php echo $row['Cus_ID'];?>" class="button">Edit</a>								
								<a href="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?php echo $Staff_ID?>&action=delete&Cus_ID=<?php echo $row['Cus_ID'];?>" class="Delete">Delete</a>
								<br></br>
                                <?php
                                }

						    }elseif($action=="edit"){
                                foreach ($custview as $row) {
                                    $Cus_ID=$row['Cus_ID'];
						?>

							<form action="" method="POST">
							    <table class="table">
									
									<tr>
										<th>
											<h3>Name</h3>
										</th>
										<td>
                                            <input type="text" name="CustName"  class="form-control input-lg col-xs-4" value="<?php echo $row['CustName']; ?>" >
											
										</td>
									</tr>
									<tr>
										<th>
											<h3>Username</h3>
										</th>
										<td>
                                            <input type="text" name="CustUName"  class="form-control input-lg col-xs-4" value="<?php echo $row['CustUName']; ?>" >
											
										</td>
									</tr>
									<tr>
										<th>
											<h3>Email</h3>
										</th>
										<td>
                                            <input type="text" name="CustEmail"  class="form-control input-lg col-xs-4" value="<?php echo $row['CustEmail']; ?>" >
											
										</td>
									</tr>
									<tr>
										<th>
											<h3>Phone Number</h3>
										</th>
										<td>
                                            <input type="text" name="CustPhoneNo"  class="form-control input-lg col-xs-4" value="<?php echo $row['CustPhoneNo']; ?>" >
											
										</td>
									</tr>


									<tr>
										<th>
											<h3>Address</h3>
										</th>
										<td>
                                            <input type="text" name="CustAddress"  class="form-control input-lg col-xs-4" value="<?php echo $row['CustAddress']; ?>" >
											

										</td>
									</tr>
									<tr>
										<th>
											<h3>Account Status</h3>
										</th>
										<td>
											<?php 
											if($row['CustAccStatus']=="Active"){
												?>
												<select name="CustAccStatus">
                                    				<option value="Active" selected>Active</option>
                                    				<option value="Banned" >Banned</option>
                                				</select>
                                            <?php 
											}elseif($row['CustAccStatus']=="Banned"){
												?>
												<select name="CustAccStatus">
                                    				<option value="Active" >Active</option>
                                    				<option value="Banned" selected>Banned</option>
                                				</select>
											<?php } ?>
										</td>
									</tr>
								</table>
                                <br>
                                
								    <div class="form-style-6">
									    <input type="hidden" name="Cus_ID" value="<?php echo $row['Cus_ID']; ?>" hidden>
										<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
									    <button type="submit" name="SaveUpdate" class="button">Save</button>
								    </div>
							    </form>
                                <?php
                                }

						    }
						?>
						<br>
					
				</fieldset>
			</div>
		</div>
	</div>
</body>
</html>
