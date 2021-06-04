<?php
require_once '../../BusinessServiceLayer/Model/ManageRegistrationModel.php';

class ManageRegistrationController{
    
    function custRegister(){
        $user = new ManageRegistrationModel();
        $user->CustUName = $_POST['CustUName'];
        $user->CustPhoneNo = $_POST['CustPhoneNo'];
        $user->CustEmail = $_POST['CustEmail'];
        $user->CustAddress = $_POST['CustAddress'];
        $user->CustPass = $_POST['CustPass'];
        $user->CustName = $_POST['CustName'];
        if($user->customerRegister() > 0){
            $message = "Your registration is SUCCESSFULLY!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = 'CustLogin.php';</script>";
        }
    }

    function custLogin(){
        $user = new ManageRegistrationModel();
        $user->CustPass = $_POST['CustPass'];
        $user->CustUName = $_POST['CustUName'];
        $stmt = $user->customerLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['Cus_ID'] = $selected['Cus_ID'];
            }
            $_SESSION["CustUName"] = $_POST['CustUName'];
            echo "<script>alert('Login Succesful! Welcome to DERCS');
            window.location = '../HomePage/customerHomePage.php?Cus_ID=".$_SESSION['Cus_ID']."';</script>"; 
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'CustLogin.php';</script>";
        }
    }

    function riderRegister(){
        $user = new ManageRegistrationModel();
        $user->RiderUName = $_POST['RiderUName'];
        $user->RiderPhoneNo = $_POST['RiderPhoneNo'];
        $user->RiderEmail = $_POST['RiderEmail'];
        $user->RiderPass = $_POST['RiderPass'];
        $user->RiderName = $_POST['RiderName'];
        $user->RiderMyKad = $_POST['RiderMyKad'];
        if($user->riderRegister() > 0){
            $message = "Your registration is SUCCESSFULLY!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = 'riderLogin.php';</script>";
        }
    }

    function riderLogin(){
        $user = new ManageRegistrationModel();
        $user->RiderPass = $_POST['RiderPass'];
        $user->RiderUName = $_POST['RiderUName'];
        $stmt = $user->riderLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['Rider_ID'] = $selected['Rider_ID'];
            }
            $_SESSION["RiderUName"] = $_POST['RiderUName'];
            echo "<script>alert('Login Succesful! Welcome to DERCS');
            window.location = '../HomePage/riderHomePage.php?Rider_ID=".$_SESSION['Rider_ID']."';</script>"; 
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'RiderLogin.php';</script>";
        }
    }


    function staffLogin(){
        $user = new ManageRegistrationModel();
        $user->StaffUName = $_POST['StaffUName'];
        $user->StaffPass = $_POST['StaffPass'];
        $stmt = $user->staffLogin();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['Staff_ID'] = $selected['Staff_ID'];
            }
            $_SESSION["StaffUName"] = $_POST['StaffUName'];
            echo "<script>alert('Login Succesful! Welcome to DERCS');
            window.location = '../HomePage/staffHomePage.php?Staff_ID=".$_SESSION['Staff_ID']."';</script>";  
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = 'staffLogin.php';</script>";
        }
    }
}

?>
    