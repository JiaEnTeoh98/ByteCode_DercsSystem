<?php
    require_once '../../BusinessServiceLayer/Model/ItemUpdateModel.php';

    class ItemUpdateController{
        
        function quotationlist(){
            $data = new ItemUpdateModel();
			//$data->Cus_ID = $Cus_ID;
			return $data-> quotationlist();
        }
        
        function searchCust($id){
            $search = new ItemUpdateModel();
            $search->id=$_POST['searchval'];
            //return $search-> searchid();
            if($search-> searchcust()){
				return $search;
			}else{
                $message = "ID not found!";
            }
        }

        function searchQuotation($Quotation_ID){
            $search = new ItemUpdateModel();
            $search->Quotation_ID=$_POST['searchval'];
            //return $search-> searchid();
            if($search-> searchquotation()){
				return $search;
			}else{
                $message = "ID not found!";
            }
        }

        function editItem($Quotation_ID){
            
        }

    }
?>