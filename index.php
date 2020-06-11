<?php
$arr = json_decode(file_get_contents("php://input"));
if (empty($arr)){ 
	exit("Data kosong.");
} else {
	$luas = 0.5 * $arr->alas * $arr->tinggi;
	echo json_encode(array("luas" => $luas));
}
?>