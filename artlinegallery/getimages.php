<?php
require_once("json.php");
require_once("db.php");

$catId = $_REQUEST['catId'];
$deleted = $_REQUEST['deleted'];
$dataAccessObj = new DataAccess();
$images = "";

$dataAccessObj->Connect();

if(isset($deleted) && $deleted == "yes")
{
	$allImagesByCatId = $dataAccessObj->GetAllCatDeletedImages($catId);
}
else
{
	$allImagesByCatId = $dataAccessObj->GetAllCatImages($catId);
}
$response = $allImagesByCatId;
//print_r($response);
$json = new Services_JSON();
echo $json->encode($response);
exit();
?>