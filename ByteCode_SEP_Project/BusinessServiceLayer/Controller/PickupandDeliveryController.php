<?php
require_once '../../BusinessServiceLayer/model/PickupandDeliveryModel.php';

class PickupandDeliveryController{
    
    function RviewAllPickupQuote(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->RviewAllPickupQuotation();
    }

    function RviewAllDeliveryQuote(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->RviewAllDeliveryQuotation();
    }

    function SviewAllPickupInv(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->SviewAllPickupInvoice();
    }

    function SviewAllDeliveryInv(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->SviewAllDeliveryInvoice();
    }

    function CviewAllPickupStat($Cus_ID){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->CviewAllPickupStatus();
    }

    function CviewAllDeliveryStat(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->CviewAllDeliveryStatus();
    }

    function viewSpeDel($Quotation_ID){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        return $req->viewSpeDelivery();
    }

    function acceptDel(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->acceptDelivery()){
            $message = "Accepted!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/PickupandDelivery/RiderUploadDeliveryEvidence.php?Quotation_ID=".$_SESSION['Quotation_ID']."';</script>";
        }
    }

    function rejectDel(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->rejectDelivery()){
            $message = "Rejected!";
		    echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/PickupandDelivery/RiderDeliveryList.php';</script>";
        }
    }

    function viewSpePick($Quotation_ID){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        return $req->viewSpePickup();
    }

    function acceptPick(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->acceptPickup()){
            $message = "Accepted!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/PickupandDelivery/RiderUploadPickupEvidence.php?Quotation_ID=".$_SESSION['Quotation_ID']."';</script>";
        }
    }

    function rejectPick(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->rejectPickup()){
            $message = "Rejected!";
		    echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/PickupandDelivery/RiderPickupList.php';</script>";
        }
    }

    function DelEvidence(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $_POST['Quotation_ID'];
        $req->DeliveryEvidence = $_FILES['DeliveryEvidence']['name'];
        $req->CODEvidence = $_FILES['CODEvidence']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["DeliveryEvidence"]["name"]);
	    // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
          // Convert to base64
          $image_base64 = base64_encode(file_get_contents($_FILES['DeliveryEvidence']['tmp_name']) );
          $req->DeliveryEvidence = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        }

        $target_dirc = "upload/";
        $target_files = $target_dirc . basename($_FILES["CODEvidence"]["name"]);
	    // Select file type
        $imageFileTypee = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arrr = array("jpg","jpeg","png","gif");
        // Check extension
        if( in_array($imageFileTypee,$extensions_arrr) ){
          // Convert to base64
          $image_basee64 = base64_encode(file_get_contents($_FILES['CODEvidence']['tmp_name']) );
          $req->CODEvidence = 'data:image/'.$imageFileTypee.';base64,'.$image_basee64;
        }

        if($req->UploadDelEvidence() > 0){
            $message = "Success Upload!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/PickupandDelivery/RiderPickupandDelivery.php';</script>";
        }
    }

    function PickEvidence(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $_POST['Quotation_ID'];
        $req->PickupEvidence = $_FILES['PickupEvidence']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["PickupEvidence"]["name"]);
	    // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
          // Convert to base64
          $image_base64 = base64_encode(file_get_contents($_FILES['PickupEvidence']['tmp_name']) );
          $req->PickupEvidence = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        }

        if($req->UploadPickEvidence() > 0){
            $message = "Success Upload!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/PickupandDelivery/RiderPickupandDelivery.php';</script>";
        }
    }
    
}

?>
    













