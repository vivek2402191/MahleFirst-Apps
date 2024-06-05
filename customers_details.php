<?php include "configuration.php";

error_reporting(1);

ini_set("display_errors", 1);

$PARTY_TYPE = $_POST["PARTY_TYPE"];
$AREA_CODE = $_POST["AREA_CODE"];
$sql = "select  * from bcomt001  where BLOCKED='N' and PARTY_TYPE='C'  AND AREA_CODE='$AREA_CODE' ORDER BY  PARTY_FNAME asc ";

$count = $db->row_count($sql);

if ($count) {
    $result = $db->getrow($sql);
    foreach ($result as $row) {
        $customercode = $row["PARTY_CODE"];
        $customertype = $row["PARTY_TYPE"];
        $customername = $row["PARTY_FNAME"];
        $customerphone = $row["PARTY_PHONE1"];
        $customeraddress = $row["CORR_ADD1"];
        $state = $row["CORR_STATE"];
        $city = $row["CORR_CITY"];
        if ($PARTY_TYPE == "C") {
            $data[] = [
                "Customer_code" => $customercode,
                "Customer_type" => $customertype,
                "Customer_name" => $customername,
                "Mobile" => $customerphone,
                "Address" => $customeraddress,
                "State" => $state,
                "City" => $city,
            ];
        }
    }
//$response = array('error'=>true,'msg'=>'Total Count','type'=>'Details','data'=> $count);
 //echo json_encode($response); 
    //echo json_encode($data);
}

$USER_TYPE = $_POST["USER_TYPE"];
$AREA_CODE = $_POST["AREA_CODE"];
$sql = "SELECT * FROM `lms_reborer` where USER_TYPE='$USER_TYPE' AND AREA_CODE='$AREA_CODE' and BLOCKED='N' AND STATUS='1'"; //retailers,REBORER,MECHANIC
$countR = $db->row_count($sql);

if ($countR) {
    $result = $db->getrow($sql);
    foreach ($result as $row) {
        $Reborer_Name = $row["Reborer_Name"];
        $Reborer_Mobile = $row["Reborer_Mobile"];
        $State = $row["State"];
        $City = $row["City"];
        $Business_name = $row["Business_name"];
        $Reborer_code = $row["Reborer_code"];

        $data[] = [
            "Reborer_Name" => $Reborer_Name,
            "Reborer_Mobile" => $Reborer_Mobile,
            "State" => $State,
            "City" => $City,
            "Business_name" => $Business_name,
            "Reborer_code" => $Reborer_code,
        ];
    }
   // echo json_encode($dataM);
}

$response = array('error'=>true,'msg'=>'Total Count','type'=>'Details','count'=> $count);
 echo json_encode($response);     		
 echo json_encode($data);