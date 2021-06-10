<?php
    require_once '../../BusinessServiceLayer/Model/ItemUpdateModel.php';

    class ItemUpdateController{
        
        function quotationlist(){
            $data = new ItemUpdateModel();
			//$data->Cus_ID = $Cus_ID;
			return $data-> quotationlist();
        }

        function quotationdata($Quotation_ID){
            $quotation = new ItemUpdateModel();
			$quotation->Quotation_ID = $Quotation_ID;
			return $quotation-> quotationdata();
        }

        function quotationupdate($Quotation_ID){
            $quotation=new ItemUpdateModel();
            $quotation->Quotation_ID = $Quotation_ID;
            $quotation->Quotation_ID = $_POST['Quotation_ID'];
            $quotation->PickupStatus = $_POST['PickupStatus'];
            $quotation->RepairStatus = $_POST['RepairStatus'];
            $quotation->RepairPrice = $_POST['RepairPrice'];
            if($quotation->quotationupdate()){
				echo "<script type='text/javascript'>window.location = '../../ApplicationLayer/ManageItemRepairingStatus/editItem.php?AccType=staff&Staff_ID=<?=$Staff_ID?>&Quotation_ID=".$_POST['Quotation_ID']."';</script>";
			}
        }

    }
?>