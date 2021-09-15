<?php include '../../src/navbar.php';?>
<?php 
require_once '../../BusinessServiceLayer/controller/ManageAccountController.php';


$AccType = $_GET['AccType'];
if($AccType=='customer'){
	$Cus_ID = $_GET['Cus_ID'];
	$customer = new ManageAccountController();
	$custview = $customer->custview($Cus_ID);
}elseif($AccType=='rider'){
	$Rider_ID = $_GET['Rider_ID'];
	$rider = new ManageAccountController();
	$riderview = $rider->riderview($Rider_ID);
}elseif($AccType=='staff'){
	$Staff_ID = $_GET['Staff_ID'];
	$staff = new ManageAccountController();
	$staffview = $staff->staffview($Staff_ID);
}


if(isset($_POST['EditCust'])){
	$custedit = $customer->custedit($Cus_ID);
}

if(isset($_POST['EditRider'])){
	$rideredit = $rider->rideredit($Rider_ID);
}

if(isset($_POST['EditStaff'])){
	$staffedit = $staff->staffedit($Staff_ID);
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
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 50%;
			}
			
			td, th {
				border: 1px solid black;
				padding: 5px;
			}

			th {
				background-color: #C3E4F6;
				text-align: center;
				width: 250px;
			}

			a{
				margin-left: 45%;
			}

			.button {
  				background-color: #4BC87A;
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
		<div class="container-fluid content mb-5">
			<div class="col-lg-12 py-4" align="center">
				<div class="col-lg  form-style-6">
					<fieldset>
						<?php 
						if($AccType=="customer"){

							foreach ($custview as $row) {
							?>
							<legend>
							<br><br>
								<h1><?php echo $row['CustUName'];?> Profile</h1>
							</legend>
							<br>
                            <form action="" method="POST">
							    <table class="data">
									
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
											<h3>Password</h3>
										</th>
										<td>
                                            <input type="text" name="CustPass"  class="form-control input-lg col-xs-4" value="<?php echo $row['CustPass']; ?>" >
											
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
								</table>
                                <br>
                                
								    <div class="form-style-6">
									    <input type="text" name="Cus_ID" value="<?php echo $row['Cus_ID']; ?>" hidden>
									    <button type="submit" name="EditCust" class="button">Save</button>
								    </div>
							    </form>
								<br></br>

								<?php
							}
						}elseif($AccType=="rider"){

							foreach ($riderview as $row) {
							?>
							<legend>
							<br>
								<h1><?php echo $row['RiderUName'];?> Profile</h1>
							</legend>

							<br>
                            <form action="" method="POST">
								<table>
									<input type="text" name="Rider_ID" value="<?php echo $row['Rider_ID']; ?>" hidden>
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
											<h3>Password</h3>
										</th>
										<td>
                                        <input type="text" name="RiderPass"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderPass']; ?>" >
											
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
											<h3>MyKad</h3>
										</th>
										<td>
                                        <input type="text" name="RiderMyKad"  class="form-control input-lg col-xs-4" value="<?php echo $row['RiderMyKad']; ?>" >
											

										</td>
									</tr>
								</table>
								<br>
                                <div class="form-style-6">
									    <input type="text" name="Rider_ID" value="<?php echo $row['Rider_ID']; ?>" hidden>
									    <button type="submit" name="EditRider" class="button">Save</button>
								    </div>
							    </form>
								<br></br>

								<?php
							}
						}elseif($AccType=="staff"){

							foreach ($staffview as $row) {
							?>
							<legend><br>
								<h1><?php echo $row['StaffUName'];?> Profile</h1>
							</legend>

							
								<br>
                                <form action="" method="POST">
								<table>
									
									<tr>
										<th>
											<h3>Username</h3>
										</th>
										<td>
                                        <input type="text" name="StaffUName"  class="form-control input-lg col-xs-4" value="<?php echo $row['StaffUName']; ?>" >
											
										</td>
									</tr>	
									<tr>
										<th>
											<h3>Password</h3>
										</th>
										<td>
                                        <input type="text" name="StaffPass"  class="form-control input-lg col-xs-4" value="<?php echo $row['StaffPass']; ?>" >
											
										</td>
									</tr>
									
								</table>
								<br>
                                <div class="form-style-6">
									    <input type="text" name="Staff_ID" value="<?php echo $row['Staff_ID']; ?>" hidden>
									    <button type="submit" name="EditStaff" class="button">Save</button>
								    </div>
							    </form>
								<br></br>

								<?php
							}
						}
						?>

						
					</fieldset>
				</div>

			</div>

		</div>

		<!--     tamat utk content   -------------------- -->
	</body>