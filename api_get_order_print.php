<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql .= "SELECT * FROM tb_order 
        INNER JOIN tb_order_detail 
        ON tb_order_detail.order_id = tb_order.order_id 
        INNER JOIN tb_product
        ON tb_product.product_id = tb_order_detail.product_id 
        INNER JOIN tb_brand
        ON tb_brand.brand_id = tb_product.brand_id 
        INNER JOIN tb_user 
        ON tb_user.user_id = tb_order.user_id 
        INNER JOIN tb_status 
        ON tb_status.status_id = tb_order.status_id 
        WHERE tb_order.status_id = '2'";
    $content = file_get_contents('php://input');
    $order = json_decode($content, true);
		
    $user_id = $order['user_id'];
    if(strlen($user_id)>0){
        $sql .= " AND tb_order.user_id = '$user_id'";
    }
    $result = $conn->query($sql);
    $arr = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($arr,$row);
      }
    }
    $output = $arr;
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
