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
	$product = json_decode($content, true);

  $product_id = $product['product_id'];
	$product_name = $product['product_name'];
	$brand_id = $product['brand_id'];
	$category_id = $product['category_id'];
	$product_price = $product['product_price'];
  $product_discount = $product['product_discount'];
	$product_quantity = $product['product_quantity'];
	$product_description = $product['product_description'];

	$sql = "UPDATE tb_product SET 
        product_name = '$product_name', 
        brand_id = '$brand_id', 
        category_id = '$category_id', 
        product_price = '$product_price', 
        product_discount = '$product_discount', 
        product_quantity = '$product_quantity', 
        product_description = '$product_description'
        WHERE product_id = '$product_id'";
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