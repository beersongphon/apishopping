
<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql .= "SELECT DISTINCT tb_product.product_id,
    (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
    tb_product.product_name,
    tb_category.category_name, 
    tb_product.product_price,
    tb_product.product_discount,
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
    $content = file_get_contents('php://input');
    $product = json_decode($content, true);
		
    $chk = "";
    foreach ($product as $rows) {
      $txtSearch = $rows['txtSearch'];
      $chk .= "'$txtSearch', ";
      //This is important as it is not the number it is a word so it should have a single quote if in query we are using double quote or vice versa.
    }
    $check_e = rtrim($chk, ", ");

    if (strlen($check_e) > 0) {
      $sql .= " AND tb_category.category_id IN ($check_e)";
    }
    $sql .= " ORDER BY tb_product.product_id DESC";
    $result = $conn->query($sql);
    $arr_data = array();
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row1 = $result->fetch_assoc()) {
        $sqls = "SELECT img_pro_id, img_product FROM tb_img_product WHERE product_id = $row1[product_id]";
        $result2 = $conn->query($sqls);
        $arr_image = array();
        if ($result2->num_rows > 0) {
          while ($row2 = $result2->fetch_assoc()) {
            array_push($arr_image, $row2);
          }
        }

        $jsonRow = array(
          "product_id" => $row1["product_id"],
          "img_product" => $row1["img_product"],
          "product_name" => $row1["product_name"],
          "category_name" => $row1["category_name"],
          "product_price" => $row1["product_price"],
          "product_discount" => $row1["product_discount"],
          "product_quantity" => $row1["product_quantity"],
          "product_description" => $row1["product_description"],
          "images" => $arr_image,
        );
        array_push($arr_data, $jsonRow);
      }
    }
    $output = $arr_data;
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>
