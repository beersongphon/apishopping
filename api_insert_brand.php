<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  
  include("./db_connect.php");

  $output = array(
    "status" => "error"
  );

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = file_get_contents('php://input');
	$brand = json_decode($content, true);

	$brand_name = $brand['brand_name'];

    $sql = "SELECT * FROM tb_brand WHERE brand_name = '$brand_name'";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) {
      $output['message'] = "ไม่สามารถเพิ่มข้อมูลได้ เนื่องจาก brand นี้มีแล้ว";
    } else {
	  $sql = "INSERT INTO tb_brand (brand_name) VALUES ('$brand_name')";
      $result = $conn->query($sql);
      if ($result) {
        $output['status'] = "success";
        $output['message'] = "บันทึกข้อมูลสำเร็จ";
      } else {
        $output['message'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
      }
    }
  } else {
	$output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>