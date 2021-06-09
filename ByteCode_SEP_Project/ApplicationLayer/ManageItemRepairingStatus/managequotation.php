<?php include '../../src/navbar.php';?>
<?php 
require_once '../../BusinessServiceLayer/controller/ItemUpdateController.php';

session_start();

$quotation = new ItemUpdateController();
$quotationlist = $quotation->quotationlist();

		
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

			td {
				background-color: white;
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
		<div class="container-fluid content mb-5">
			<div class="col-lg-12 py-4" align="center">
				<div class="col-lg  form-style-6">
					<fieldset>
						
							<legend>
							<br><br>
								<h1>Quotation List</h1>
							</legend>
							<br>

							<table class="table " style="font-size: 15px; ">

								<thead >
									<tr>
										<th style="width: 30px;">
											<h3>Quotation ID</h3>
										</th >
										<th >
											<h3>Customer Name</h3>
										</th >
                                        <th style="width: 20%;">
											<h3>Item</h3>
										</th >
										<th style="width: 30%;">
											<h3>Action</h3>
										</th >
									</tr>

								</thead>

								<?php 
							        foreach ($quotationlist as $row) {
							    ?>
								<tr>
                                <td style="padding-left: 15px;">
										<?php echo $row['Quotation_ID']; ?>
										
									</td>
									<td style="padding-left: 15px;">
										<?php echo $row['CustName']; ?>
										
									</td>
                                    <td style="padding-left: 15px;">
										<?php echo $row['DeviceModel']; ?>
										
									</td>
									<td style="text-align: center;">
										<form action="" method="POST">
											<input type="hidden" name="Quotation_ID" value="<?php echo $row['Quotation_ID']; ?>" hidden>
										<!--<input type="hidden" name="Staff_ID" value="<?php echo $Staff_ID; ?>" hidden>
											<button type="submit" formaction="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?=$Staff_ID?>&action=view&Cus_ID=<?=$row['Cus_ID']?>" class="button">View</button>
											<button type="submit" formaction="../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=<?=$Staff_ID?>&action=edit&Cus_ID=<?=$row['Cus_ID']?>" class="Ban">Edit</button>
											
											
											<button type="submit" class="Delete" name="deleteCust" onclick="return confirm('Confirm update account status for selected customer?')">Delete</a>
										</form>-->
									</td>
								</tr>
								<?php 
								
								}?>
                            </table>

						
					</fieldset>
				</div>

			</div>

		</div>

		<!--     tamat utk content   -------------------- -->
	</body>