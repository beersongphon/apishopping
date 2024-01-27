<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  
  include("./db_connect.php");

  $output = array(
    "status" => "error"
  );

  if ($_SERVER["REQUEST_METHOD"] == "PUT") {
	$content = file_get_contents('php://input');
	$brand = json_decode($content, true);

	$brand_id = $brand['brand_id'];
	$brand_name = $brand['brand_name'];

	$sql = "UPDATE tb_brand SET brand_name = '$brand_name' WHERE brand_id = '$brand_id'";
	$result = $conn->query($sql);
	if ($result) {
	  $output['status'] = "success";
	  $output['message'] = "บันทึกข้อมูลสำเร็จ";
	} else {
	  $output['message'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
	}
  } else {
	$output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>