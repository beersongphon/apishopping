<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include('./db_connect.php');

  $sql = "SELECT DISTINCT tb_product.product_id,
  (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
  tb_product.product_name,
  tb_category.category_name, 
  tb_product.product_price,
  tb_product.product_quantity,
  tb_product.product_description
  FROM tb_product
  LEFT JOIN
  tb_img_product
  ON
  tb_product.product_id = tb_img_product.product_id
  LEFT JOIN
  tb_category
  ON
  tb_product.category_id = tb_category.category_id
  WHERE tb_product.product_quantity NOT IN ('0')";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = file_get_contents('php://input');
    $array = json_decode($content, true);

    $chk="";  
    foreach ($array as $rows) {
      $txtSearch = $rows['txtSearch'];
      $chk .= "'$txtSearch', ";
      //This is important as it is not the number it is a word so it should have a single quote if in query we are using double quote or vice versa.
    }
    $check_e = rtrim($chk, ", ");

    if (strlen($check_e) > 0) {
      $sql .= " AND tb_product.category_id IN ($check_e)";
    }
  }

  $sql .= " ORDER BY tb_product.product_id ASC";
  $result = $conn->query($sql);
  $arr_data = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      array_push($arr_data, $row);
    }
  } else {
    echo "0 results";
  }
  echo json_encode($arr_data);
  $conn->close();
?>
