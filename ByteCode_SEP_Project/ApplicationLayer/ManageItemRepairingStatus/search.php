<?php include '../../src/navbar1.php';?>
<?php 
require_once '../../BusinessServiceLayer/controller/ItemUpdateController.php';

session_start();
//$Staff_ID = $_GET['Staff_ID'];
$quotation = new ItemUpdateController();

if(isset($_POST["editItem"])){
  $Quotation_ID = $_POST["Quotation_ID"];
  $quotation->editItem($id);
}

$quotationlist = $quotation->quotationlist();

?>
<!DOCTYPE html>
<html>
<head>
    <title>STAFF | DERCS</title>
    <meta charset="utf-8">
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
<center>

<!--<div class="search">
<br><br>
<form action='' method='POST' name='form_filter'>    

    <tr><b>Search</b></tr>
    <tr>
    <td><input type='text' name='searchval' id='searchval' placeholder='Enter id here...' size='50'></td>
    </tr>
    
</form>
</div>
<br><br>

<div id="result"></div> -->

<br><br>
<font color="white">
	<b>Search</b>
</font>

<input type="text" name="myinput" id="myInput" onkeyup="myFunction()" placeholder="Quotation ID.." title="Type in a name">

<br><br>

<table class="table" id="myTable" style="font-size: 15px; ">

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
            <center>
                <input type="hidden" name="Quotation_ID" value="<php echo $row['Quotation_ID']; ?>"/>
                <button type="submit" name="editItem" class="button">Edit Item</button>
            </center>
        </form>
									</td>
								</tr>
								<?php 
								
								}?>
                            </table>

<center>
</body>

</html>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<!--<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#searchval').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>-->