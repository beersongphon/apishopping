<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_quantity = 0;
    $sql .= "SELECT * FROM tb_product 
    LEFT JOIN
    tb_brand
    ON
    tb_product.brand_id = tb_brand.brand_id
    LEFT JOIN
    tb_category
    ON
    tb_product.category_id = tb_category.category_id
    -- WHERE product_quantity NOT IN ('0')
    ORDER BY product_date ASC";
    $content = file_get_contents('php://input');
    $report = json_decode($content, true);
		
    // $product_id = $report['product_id'];

    // if(strlen($product_id)>0){
    //     $sql .= " WHERE product_id = '$product_id'";
    // }
    $result = $conn->query($sql);
    $arr = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($arr,$row);
        $product_quantity += $row['product_quantity'];
      }
    }
    $output['status'] = "success";
    $output['data'] = $arr;
    $output['quantity_total'] = $product_quantity;
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
