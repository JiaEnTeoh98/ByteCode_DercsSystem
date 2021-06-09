<?php include '../../src/navbar.php';?>
<?php 
require_once '../../BusinessServiceLayer/controller/ManageAccountController.php';

session_start();
$AccType = 'staff';
$Staff_ID = $_GET['Staff_ID'];
$action = $_GET['action'];
if($action=='list'){
	//
	$rider = new ManageAccountController();
	$riderlist = $rider->riderlist();
}elseif($action=='view'){
	$Rider_ID = $_GET['Rider_ID'];
	$rider = new ManageAccountController();
	$riderview = $rider->riderview($Rider_ID);
}elseif($action=='edit'){
	$Rider_ID = $_GET['Rider_ID'];
	$rider = new ManageAccountController();
	$riderview = $rider->riderview($Rider_ID);
}

if(isset($_POST['riderview'])){
	$riderview = $rider->riderview($Rider_ID);
}

//click save button
if(isset($_POST['SaveUpdate'])){
	$Rider_ID = $_POST['Rider_ID'];
	$rider = new ManageAccountController();
	$rideredit = $rider->updateriderdata($Rider_ID);
}

//click ban button
if(isset($_POST['updateStatus'])){
	$rider = new ManageAccountController();
	$updateStat = $rider->updateriderStatus($Rider_ID);
}

//click delete button
if(isset($_POST['deleteCust'])){
	$rider = new ManageAccountController();
	$deleterider= $rider->deleterider($Rider_ID);
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
			td {
				background-color: white;

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
								foreach ($riderlist as $row) {
								$i++;
								?>
								<tr>
									<td style="text-align: center;">
										
										<?php echo $i; ?>
									</td>
									<td style="padding-left: 15px;">
										<?php echo $row['RiderName']; ?>
										
									</td>
                                    <td style="padding-left: 15px;">
										<?php echo $row['RiderEmail']; ?>
										
									</td>
									<td>
										<form action="" method="POST">
										<center>
										<?php 
											if($row['RiderAccStatus']=="Pending"){
												?>
												<select name="RiderAccStatus">
                                    				<option value="Pending" selected>Pending</option>
                                    				<option value="Approved" >Approved</option>
                                                    <option value="Rejected" >Rejected</option>
                                				</select>
                                            <?php 
											}elseif($row['RiderAccStatus']=="Approved"){
												?>
												<select name="RiderAccStatus">
                                    				<option value="Pending" >Pending</option>
                                    				<option value="Approved" selected>Approved</option>
                                                    <option value="Rejected" >Rejected</option>
                                				</select>
											<?php }elseif($row['RiderAccStatus']=="Rejected"){
												?>
												<select name="RiderAccStatus">
                                    				<option value="Pending" >Pending</option>
                                                    <option value="Approved" >Approved</option>
                                    				<option value="Rejected" selected>Rejected</option>
                                				</select>
											<?php } ?>
											<input type="hidden" name="Rider_ID" value="<?php echo $row['Rider_ID']; ?>" hidden>
											<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
											<button type="submit" class="Edit" name="updateStatus" onclick="return confirm('Confirm update account status for selected customer?')">Update</a>
										</center>	
										</form>
									</td>
									<td style="text-align: center;">
										<form action="" method="POST">
											<input type="hidden" name="Rider_ID" value="<?php echo $row['Rider_ID']; ?>" hidden>
											<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
											<button type="submit" formaction="../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=<?=$Staff_ID?>&action=view&Rider_ID=<?=$row['Rider_ID']?>" class="button">View</button>
											<button type="submit" formaction="../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=<?=$Staff_ID?>&action=edit&Rider_ID=<?=$row['Rider_ID']?>" class="Ban">Edit</button>											
											<button type="submit" class="Delete" name="deleteRider" onclick="return confirm('Confirm update account status for selected rider?')">Delete</a>
										</form>
									</td>
								</tr>
								<?php 
								
								}?>
                            </table>

						<?php
                                

						    }elseif($action=="view"){
                                foreach ($riderview as $row) {
                                    $Rider_ID=$row['Rider_ID'];
						?>

                                <table class="table">
									<input type="hidden" name="Rider_ID" value="<?php echo $row['Rider_ID']; ?>" >
									<tr>
										<th>
											<h3>Name</h3>
										</th>
										<td>
											<?php echo $row['RiderName']; ?>
										</td>
									</tr>
									<tr>
										<th>
											<h3>Username</h3>
										</th>
										<td>
											<?php echo $row['RiderUName']; ?>
										</td>
									</tr>
									<tr>
										<th>
											<h3>Password</h3>
										</th>
										<td>
											<?php echo $row['RiderPass']; ?>
										</td>
									</tr>
									<tr>
										<th>
											<h3>Email</h3>
										</th>
										<td>
											<?php echo $row['RiderEmail']; ?>
										</td>
									</tr>
									<tr>
										<th>
											<h3>Phone Number</h3>
										</th>
										<td>
											<?php echo $row['RiderPhoneNo']; ?>
										</td>
									</tr>


									<tr>
										<th>
											<h3>MyKad</h3>
										</th>
										<td>
											<?php echo $row['RiderMyKad']; ?>

										</td>
									</tr>
                                    <tr>
										<th>
											<h3>Account Status</h3>
										</th>
										<td>
											<?php echo $row['RiderAccStatus']; ?>
										</td>
									</tr>
								</table>
								<br>
								<a style="margin-left: 40%;" href="../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=<?php echo $Staff_ID?>&action=edit&Rider_ID=<?php echo $row['Rider_ID'];?>" class="button">Edit</a>								
								<a href="../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=<?php echo $Staff_ID?>&action=delete&Rider_ID=<?php echo $row['Rider_ID'];?>" class="Delete">Delete</a>
								<br></br>
                                <?php
                                }

						    }elseif($action=="edit"){
                                foreach ($riderview as $row) {
                                    $Cus_ID=$row['Rider_ID'];
						?>

							<form action="" method="POST">
							    <table class="table">
									
									<tr>
										<th>
											<h3>Name</h3>
										</th>
										<td>
                                            <input type="text" name="RiderName"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderName']; ?>" >
											
										</td>
									</tr>
									<tr>
										<th>
											<h3>Username</h3>
										</th>
										<td>
                                            <input type="text" name="RiderUName"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderUName']; ?>" >
											
										</td>
									</tr>
									<tr>
										<th>
											<h3>Email</h3>
										</th>
										<td>
                                            <input type="text" name="RiderEmail"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderEmail']; ?>" >
											
										</td>
									</tr>
									<tr>
										<th>
											<h3>Phone Number</h3>
										</th>
										<td>
                                            <input type="text" name="RiderPhoneNo"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderPhoneNo']; ?>" >
											
										</td>
									</tr>


									<tr>
										<th>
											<h3>My Kad</h3>
										</th>
										<td>
                                            <input type="text" name="RiderMyKad"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderMyKad']; ?>" >
											

										</td>
									</tr>
									<tr>
										<th>
											<h3>Account Status</h3>
										</th>
										<td>
											<?php 
											if($row['RiderAccStatus']=="Pending"){
												?>
												<select name="RiderAccStatus">
                                    				<option value="Pending" selected>Pending</option>
                                    				<option value="Approved" >Approved</option>
                                                    <option value="Rejected" >Rejected</option>
                                				</select>
                                            <?php 
											}elseif($row['RiderAccStatus']=="Approved"){
												?>
												<select name="RiderAccStatus">
                                    				<option value="Pending" >Pending</option>
                                    				<option value="Approved" selected>Approved</option>
                                                    <option value="Rejected" >Rejected</option>
                                				</select>
											<?php }elseif($row['RiderAccStatus']=="Rejected"){
												?>
												<select name="RiderAccStatus">
                                    				<option value="Pending" >Pending</option>
                                                    <option value="Approved" >Approved</option>
                                    				<option value="Rejected" selected>Rejected</option>
                                				</select>
											<?php } ?>
										</td>
									</tr>
								</table>
                                <br>
                                
								    <div class="form-style-6">
									    <input type="hidden" name="Rider_ID" value="<?php echo $row['Rider_ID']; ?>" hidden>
										<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
									    <button style="margin-left: 50%;" type="submit" name="SaveUpdate" class="button">Save</button>
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
