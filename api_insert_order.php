<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
  date_default_timezone_set("Asia/Bangkok");
  include("db_connect.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$content = file_get_contents('php://input');
	$order = json_decode($content, true);

	$user_id = $order['user_id'];
	$order_id = $order['order_id'];
	$order_name = $order['order_name'];
	$order_address = $order['order_address'];
	$order_tel = $order['order_tel'];
	$order_email = $order['order_email'];
	$order_date = date("Y-m-d");
	$order_total = $order['order_total'];

	$sql = "INSERT INTO tb_order(user_id, order_id, order_name, order_address, order_tel, order_email, order_date, order_total, status_id)  
      VALUES('$user_id', '$order_id', '$order_name', '$order_address', '$order_tel', '$order_email', '$order_date', '$order_total', '1')";
	$result = $conn->query($sql);
	if ($result) {
	  echo json_encode(['status' => 'success', 'message' => 'บันทึกข้อมูลสำเร็จ']);
	} else {
	  echo json_encode(['status' => 'error', 'message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
	}
  } else {
    echo json_encode(['status' => 'error', 'message' => 'REQUEST_METHOD ผิดพลาด']);
  }
  $conn->close();
?>