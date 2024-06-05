<?php include "configuration.php";
//error_reporting(1);

//dealers totals or customers
$PARTY_TYPE = $_POST["PARTY_TYPE"];
$AREA_CODE = $_POST["AREA_CODE"];
$sql = "select  * from bcomt001  where BLOCKED='N' and PARTY_TYPE='C' AND AREA_CODE='$AREA_CODE' ORDER BY  PARTY_FNAME desc ";
$count = $db->row_count($sql);
if ($count) {
  if ($PARTY_TYPE == "C") {
        $datad[] = ["Total Dealers" => $count];
        echo json_encode($datad);
    }
} 
// total retailers
$USER_TYPE = $_POST["USER_TYPE"];
$AREA_CODE = $_POST["AREA_CODE"];
//$EMP_CODE = $_POST["EMP_CODE"];
$sql1 = "SELECT * FROM `lms_reborer` where USER_TYPE='$USER_TYPE' AND AREA_CODE='$AREA_CODE' and BLOCKED='N' AND STATUS='1' ";
$countRT = $db->row_count($sql1);
if ($countRT) {
    if ($USER_TYPE == "RT") {
        $datart[] = ["Total Retailers" => $countRT];
        echo json_encode($datart);
    }
} 
// roboerer total
$USER_TYPE = $_POST["USER_TYPE"];
$AREA_CODE = $_POST["AREA_CODE"];
$sql2 = "SELECT * FROM `lms_reborer` where USER_TYPE='$USER_TYPE' AND  AREA_CODE='$AREA_CODE' and BLOCKED='N' AND STATUS='1'";
$countR = $db->row_count($sql2);
if ($countR) {
    if ($USER_TYPE == "R") {
        $dataR[] = ["Total Reborers" => $countR];
        echo json_encode($dataR);
    }
} 
// Mechanic total
$USER_TYPE = $_POST["USER_TYPE"];
$AREA_CODE = $_POST["AREA_CODE"];
$sql3 = "SELECT * FROM `lms_reborer` where USER_TYPE='$USER_TYPE' AND  AREA_CODE='$AREA_CODE' and BLOCKED='N' AND STATUS='1'";
$countM = $db->row_count($sql3);
if ($countM) {
    if ($USER_TYPE == "M") {
        $dataM[] = ["Total Mechanics" => $countM];
        echo json_encode($dataM);
    }
} /*else {
    $dataM = ["error" => false, "msg" => "not found"];
    echo json_encode($dataM);
}*/
