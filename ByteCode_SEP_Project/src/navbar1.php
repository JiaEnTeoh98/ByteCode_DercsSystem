
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

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color:#8bc1de ;
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
  <a href="../../ApplicationLayer/HomePage/MainPage.php">Home</a>
  <a href="userLogin.php"><img src="https://i.ibb.co/Rb8ykrV/Whats-App-Image-2021-06-10-at-01-51-01.jpg" alt="Logo" height="25px" width="80px"></a>
  <div class="dropdown">
    <button class="dropbtn">Login
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../ApplicationLayer/ManageRegistration/CustLogin.php">Customer</a>
      <a href="../../ApplicationLayer/ManageRegistration/RiderLogin.php">Rider</a>
      <a href="../../ApplicationLayer/ManageRegistration/StaffLogin.php">Staff</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Register
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../ApplicationLayer/ManageRegistration/CustRegister.php">Customer</a>
      <a href="../../ApplicationLayer/ManageRegistration/RiderRegistration.php">Rider</a>
    </div>
    <div class="dropdown">
    <button class="dropbtn">Logout
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../ApplicationLayer/ManageRegistration/CustLogout.php">Customer</a>
      <a href="../../ApplicationLayer/ManageRegistration/RiderLogout.php">Rider</a>
      <a href="../../ApplicationLayer/ManageRegistration/StaffLogout.php">Staff</a>
    </div>
</div>



</body>
</html>


