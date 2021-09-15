<?php 
require_once '../../BusinessServiceLayer/controller/ManageAccountController.php';


$AccType = $_GET['AccType'];
if($AccType=='customer'){
	$Cus_ID = $_GET['Cus_ID'];

}elseif($AccType=='rider'){
	$Rider_ID = $_GET['Rider_ID'];

}elseif($AccType=='staff'){
	$Staff_ID = $_GET['Staff_ID'];

}

		
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #d2e8e7;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  padding: 18px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
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
</style>
</head>
<body>


<div class="navbar">
  
  
  <?php if($AccType=='customer'){ ?>
    <a href="../../ApplicationLayer/HomePage/customerHomePage.php?AccType=customer&Cus_ID=<?=$Cus_ID?>"><img src="https://i.ibb.co/Rb8ykrV/Whats-App-Image-2021-06-10-at-01-51-01.jpg" alt="Logo" height="25px" width="80px"></a>
  <div class="dropdown">
    <button class="dropbtn">My Details
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">

      <a href="../../ApplicationLayer/ManageAccount/myaccount.php?AccType=customer&Cus_ID=<?=$Cus_ID?>">Account</a>
      
    </div><?php }elseif($AccType=='rider'){ ?>
      <a href="../../ApplicationLayer/HomePage/riderHomePage.php?AccType=rider&Rider_ID=<?=$Rider_ID?>"><img src="https://i.ibb.co/Rb8ykrV/Whats-App-Image-2021-06-10-at-01-51-01.jpg" alt="Logo" height="25px" width="80px"></a>
  <div class="dropdown">
      <button class="dropbtn">My Details
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">

      <a href="../../ApplicationLayer/ManageAccount/myaccount.php?AccType=rider&Rider_ID=<?=$Rider_ID?>">Account</a>
      
    </div><?php }elseif($AccType=='staff'){ ?>
      <a href="../../ApplicationLayer/HomePage/staffHomePage.php?AccType=staff&Staff_ID=<?=$Staff_ID?>"><img src="https://i.ibb.co/Rb8ykrV/Whats-App-Image-2021-06-10-at-01-51-01.jpg" alt="Logo" height="25px" width="80px"></a>
  <div class="dropdown">
      <button class="dropbtn">Manage Account
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      			<a href="../../ApplicationLayer/ManageAccount/myaccount.php?AccType=staff&Staff_ID=<?=$Staff_ID?>">My Account</a>
      			<a href="../../ApplicationLayer/ManageAccount/managecustomer.php?AccType=staff&action=list&Staff_ID=<?=$Staff_ID?>">Manage Customer</a>
      			<a href="../../ApplicationLayer/ManageAccount/managerider.php?AccType=staff&action=list&Staff_ID=<?=$Staff_ID?>">Manage Rider</a>
    		</div>
        <?php } ?>
  </div> 




</body>
</html>


