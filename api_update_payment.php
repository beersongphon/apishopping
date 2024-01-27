<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
	
	include("db_connect.php");
	
	if($_SERVER["REQUEST_METHOD"] == "PUT"){
		$content = file_get_contents('php://input');
		$order = json_decode($content, true);
		
		$order_id = $order['order_id'];
		$order_name = $order['order_name'];
		$order_address = $order['order_address'];
	
		$sql = "UPDATE tb_order SET 
        order_name = '$order_name', 
        order_address = '$order_address', 
        status_id = '2'
        WHERE order_id = '$order_id'";
		$result = $conn->query($sql);
		if ($result){
			echo json_encode(['status'=>'success','message'=>'บันทึกข้อมูลสำเร็จ']);
		}
		else{
			echo json_encode(['status'=>'error','message'=>'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
		}
	
	}
	else{
		echo json_encode(['status'=>'error','message'=>'REQUEST_METHOD ผิดพลาด']);
	}
	$conn->close();
?>