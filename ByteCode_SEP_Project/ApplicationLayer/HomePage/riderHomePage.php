<?php include '../../src/navbar1.php';?>
<?php
session_start();
require_once '../../BusinessServiceLayer/controller/ManageAccountController.php';

$Rider_ID = $_GET['Rider_ID'];
$AccType = 'rider';

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="manageAcc.css">
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

  td {
  text-align: center;
}
}
</style>
</head>
<body>


<br><br>
<center>
        <table >
        <tr>
        
        <!--<div class="row" style="text-align: center;">-->
        <td><a href="../PickupandDelivery/RiderPickupandDelivery.php>" style="color: black; text-decoration: none;"><img src="Image/pickup.jpg" width="200px" height="150px"></a></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
        <td><a href="../PickupandDelivery/RiderPickupandDelivery.php>" style="color: black; text-decoration: none;"><h4>Handle Pickup and Delivery</h4></a></td>
        </tr>
        </table>
  </center>
           
       
</body>
</html>


