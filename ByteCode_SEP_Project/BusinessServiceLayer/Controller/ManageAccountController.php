<?php 
    require_once '../../BusinessServiceLayer/Model/ManageAccountModel.php';

    class ManageAccountController{

        //customer

        function custview($Cus_ID){
			$customer = new ManageAccountModel();
			$customer->Cus_ID = $Cus_ID;
			return $customer-> custdata();
		}

        function custedit($Cus_ID){
			$customer = new ManageAccountModel();
			$customer->Cus_ID = $_POST['Cus_ID'];
			$customer->CustName = $_POST['CustName'];
			$customer->CustUName = $_POST['CustUName'];
			$customer->CustPass = $_POST['CustPass'];
			$customer->CustEmail = $_POST['CustEmail'];
			$customer->CustPhoneNo = $_POST['CustPhoneNo'];
			$customer->CustAddress = $_POST['CustAddress'];

			if($customer->custupdate()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/myaccount.php?AccType=customer&Cus_ID=".$_POST['Cus_ID']."';</script>";
			}
		}

        //rider

        function riderview($Rider_ID){
			$rider = new ManageAccountModel();
			$rider->Rider_ID = $Rider_ID;
			return $rider-> riderdata();
		}

        function rideredit($Rider_ID){
			$rider = new ManageAccountModel();
			$rider->Rider_ID = $_POST['Rider_ID'];
			$rider->RiderName = $_POST['RiderName'];
			$rider->RiderUName = $_POST['RiderUName'];
			$rider->RiderPass = $_POST['RiderPass'];
			$rider->RiderEmail = $_POST['RiderEmail'];
			$rider->RiderPhoneNo = $_POST['RiderPhoneNo'];
			$rider->RiderMyKad = $_POST['RiderMyKad'];

			if($rider->riderupdate()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/myaccount.php?AccType=rider&Rider_ID=".$_POST['Rider_ID']."';</script>";
			}
		}

        //staff

        function staffview($Staff_ID){
			$staff = new ManageAccountModel();
			$staff->Staff_ID = $Staff_ID;
			return $staff-> staffdata();
		}

        function staffedit($Staff_ID){
			$staff = new ManageAccountModel();
			$staff->Staff_ID = $_POST['Staff_ID'];
			$staff->StaffUName = $_POST['StaffUName'];
			$staff->StaffPass = $_POST['StaffPass'];

			if($staff->staffupdate()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/myaccount.php?AccType=staff&Staff_ID=".$_POST['Staff_ID']."';</script>";
			}
		}

		//staff - manage customer

		function custlist(){
			$customer = new ManageAccountModel();
			return $customer-> custlist();
		}

		function updatecustdata($Cus_ID){
			$customer = new ManageAccountModel();
			$customer->Staff_ID = $_POST['Staff_ID'];
			$customer->Cus_ID = $_POST['Cus_ID'];
			$customer->CustName = $_POST['CustName'];
			$customer->CustUName = $_POST['CustUName'];
			
			$customer->CustEmail = $_POST['CustEmail'];
			$customer->CustPhoneNo = $_POST['CustPhoneNo'];
			$customer->CustAddress = $_POST['CustAddress'];
			$customer->CustAccStatus = $_POST['CustAccStatus'];

			if($customer->updatecustdata()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=".$_POST['Staff_ID']."&action=view&Cus_ID=".$_POST['Cus_ID']."';</script>";
			}
		}

		function updatecustStatus($Cus_ID){
			$Cus_ID=$_POST['Cus_ID'];
			$Staff_ID= $_POST['Staff_ID'];
			$customer = new ManageAccountModel();
			$customer->Staff_ID = $_POST['Staff_ID'];
			$customer->Cus_ID = $_POST['Cus_ID'];
			$customer->CustAccStatus = $_POST['CustAccStatus'];

			if($customer->updateStatcust()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=".$Staff_ID."&action=view&Cus_ID=".$Cus_ID."';</script>";
			}
		}

		function deletecust($Cus_ID){
			$customer = new ManageAccountModel();
			$customer->Staff_ID = $_POST['Staff_ID'];
			$customer->Cus_ID = $_POST['Cus_ID'];

			if($customer->deletecust()){
				$message = "Delete Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/managecustomer.php?Staff_ID=".$_POST['Staff_ID']."&action=list';</script>";
			}
		}

		//staff - manage rider

		
		function riderlist(){
			$rider = new ManageAccountModel();
			return $rider-> riderlist();
		}

		function updateriderdata($Rider_ID){
			$rider = new ManageAccountModel();
			$rider->Staff_ID = $_POST['Staff_ID'];
			$rider->Rider_ID = $_POST['Rider_ID'];
			$rider->RiderName = $_POST['RiderName'];
			$rider->RiderUName = $_POST['RiderUName'];
			$rider->RiderEmail = $_POST['RiderEmail'];
			$rider->RiderPhoneNo = $_POST['RiderPhoneNo'];
			$rider->RiderMyKad = $_POST['RiderMyKad'];
			$rider->RiderAccStatus = $_POST['RiderAccStatus'];

			if($rider->updateriderdata()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=".$_POST['Staff_ID']."&action=view&Rider_ID=".$_POST['Rider_ID']."';</script>";
			}
		}

		function updateriderStatus($Rider_ID){
			$Rider_ID=$_POST['Rider_ID'];
			$Staff_ID= $_POST['Staff_ID'];
			$rider = new ManageAccountModel();
			$rider->Staff_ID = $_POST['Staff_ID'];
			$rider->Rider_ID = $_POST['Rider_ID'];
			$rider->RiderAccStatus = $_POST['RiderAccStatus'];

			if($rider->updateStatrider()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=".$Staff_ID."&action=view&Rider_ID=".$Rider_ID."';</script>";
			}
		}

		function deleterider($Rider_ID){
			$rider = new ManageAccountModel();
			$rider->Staff_ID = $_POST['Staff_ID'];
			$rider->Rider_ID = $_POST['Rider_ID'];

			if($rider->deleterider()){
				$message = "Delete Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../../ApplicationLayer/ManageAccount/managerider.php?Staff_ID=".$_POST['Staff_ID']."&action=list';</script>";
			}
		}

    }
?>