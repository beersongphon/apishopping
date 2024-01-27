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
	$category = json_decode($content, true);

	$category_id = $category['category_id'];
	$category_name = $category['category_name'];

	$sql = "UPDATE tb_category SET category_name = '$category_name' WHERE category_id = '$category_id'";
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