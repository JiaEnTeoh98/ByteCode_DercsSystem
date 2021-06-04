<?php
require_once '../../libs/database.php';

class ManageRegistrationModel{

    public $Cus_ID, $CustUName, $CustPhoneNo, $CustEmail, $CustAddress,$CustName, $CustPass;
    public $Rider_ID, $RiderUName, $RiderMyKad, $RiderEmail, $RiderName, $RiderPass, $RiderPhoneNo;
    public $Staff_ID, $StaffUName, $StaffPass;

    function customerRegister(){
        $sql = "insert into customer(CustUName,CustName, CustPhoneNo, CustEmail, CustAddress, CustPass) values(:CustUName, :CustName, :CustPhoneNo, :CustEmail, :CustAddress, :CustPass)";
        $args = [':CustUName'=>$this->CustUName, ':CustPhoneNo'=>$this->CustPhoneNo, ':CustEmail'=>$this->CustEmail, ':CustAddress'=>$this->CustAddress,  ':CustPass'=>$this->CustPass, ':CustName'=>$this->CustName];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function customerLogin(){
    	$sql = "select * from customer where CustUName=:CustUName and CustPass=:CustPass";
    	$args = [':CustUName'=>$this->CustUName, ':CustPass'=>$this->CustPass];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
    
    function riderRegister(){
        $sql = "insert into rider(RiderUName, RiderPhoneNo, RiderEmail, RiderMyKad, RiderPass, RiderName) values(:RiderUName, :RiderPhoneNo, :RiderEmail, :RiderMyKad, :RiderPass, :RiderName)";
        $args = [':RiderUName'=>$this->RiderUName, ':RiderPhoneNo'=>$this->RiderPhoneNo, ':RiderEmail'=>$this->RiderEmail, ':RiderMyKad'=>$this->RiderMyKad, ':RiderPass'=>$this->RiderPass, ':RiderName'=>$this->RiderName];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function riderLogin(){
    	$sql = "select * from rider where RiderUName=:RiderUName and RiderPass=:RiderPass";
    	$args = [':RiderUName'=>$this->RiderUName, ':RiderPass'=>$this->RiderPass];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
    
    function staffLogin(){
    	$sql = "select * from staff where StaffUName=:StaffUName and StaffPass=:StaffPass";
    	$args = [':StaffUName'=>$this->StaffUName, ':StaffPass'=>$this->StaffPass];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
}
?>
