<?php
    require_once '../../libs/database.php';

    class ManageAccountModel{

        public $Cus_ID, $CustUName, $CustPhoneNo, $CustEmail, $CustAddress,$CustName, $CustPass;
        public $Rider_ID, $RiderUName, $RiderMyKad, $RiderEmail, $RiderName, $RiderPass, $RiderPhoneNo;
        public $Staff_ID, $StaffUName, $StaffPass;

        function custdata()
        {
            $sql = "select * from customer where Cus_ID=:Cus_ID";
            $args = [':Cus_ID' => $this->Cus_ID];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

        function custupdate(){
		 
            $sql = "update customer set  CustName=:CustName , CustUName=:CustUName ,  CustPass=:CustPass , CustEmail=:CustEmail , CustPhoneNo=:CustPhoneNo , CustAddress=:CustAddress where Cus_ID=:Cus_ID";
            $args = [':Cus_ID' => $this->Cus_ID, ':CustName' => $this->CustName, ':CustUName' => $this->CustUName,':CustPass' => $this->CustPass, ':CustEmail' => $this->CustEmail, ':CustPhoneNo' => $this->CustPhoneNo, ':CustAddress' => $this->CustAddress];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

        //rider

        function riderdata()
        {
            $sql = "select * from rider where Rider_ID=:Rider_ID";
            $args = [':Rider_ID' => $this->Rider_ID];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

        function riderupdate(){
		 
            $sql = "update rider set  RiderName=:RiderName , RiderUName=:RiderUName ,  RiderPass=:RiderPass , RiderEmail=:RiderEmail , RiderPhoneNo=:RiderPhoneNo , RiderAddress=:RiderAddress where Rider_ID=:Rider_ID";
            $args = [':Rider_ID' => $this->Rider_ID, ':RiderName' => $this->RiderName, ':RiderUName' => $this->RiderUName,':RiderPass' => $this->RiderPass, ':RiderEmail' => $this->RiderEmail, ':RiderPhoneNo' => $this->RiderPhoneNo, ':RiderMyKad' => $this->RiderMyKad];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

        //staff

        function staffdata()
        {
            $sql = "select * from staff where Staff_ID=:Staff_ID";
            $args = [':Staff_ID' => $this->Staff_ID];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

        function staffupdate(){
		 
            $sql = "update staff set  StaffUName=:StaffUName ,  CustPass=:StaffPass where Staff_ID=:Staff_ID";
            $args = [':Staff_ID' => $this->Staff_ID, ':StaffUName' => $this->StaffUName,':StaffPass' => $this->StaffPass];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }
    }
?>