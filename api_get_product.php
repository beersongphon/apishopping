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
		$product = json_decode($content, true);
		
		$txtSearch = $product['txtSearch'];

		if (strlen($txtSearch)>0){
			$sql .= " AND tb_product.product_id = '$txtSearch' OR 
							tb_product.product_name LIKE '%$txtSearch%'
			";
		}
    $sql .= " ORDER BY tb_product.product_id ASC";
	} elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql .= " ORDER BY tb_product.product_id DESC";
  }
	$result = $conn->query($sql);
  $arr_data = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while($row1 = $result->fetch_assoc()) {
      $sqls = "SELECT * FROM tb_img_product WHERE product_id = $row1[product_id]";
      $result2 = $conn->query($sqls);
      $arr_image = array();
      if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {
          array_push($arr_image, $row2);      
        }     
      }
            
      $jsonRow = array(
        "product_id"=> $row1["product_id"],
        "img_product"=> $row1["img_product"],
        "product_name"=> $row1["product_name"],
        "category_name"=> $row1["category_name"],
        "product_price"=> $row1["product_price"],
        "product_quantity"=> $row1["product_quantity"],
        "product_description"=> $row1["product_description"],
        "images"=> $arr_image,
      );
      array_push($arr_data, $jsonRow);      
    }
  }
	echo json_encode($arr_data);
	$conn->close();
?>
