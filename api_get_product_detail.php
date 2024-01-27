<?php
  // header('Access-Control-Allow-Origin: *');
  // include("./db_connect.php");
  // $sql = "";
  // $output = array();

  // if(isset($_GET['title'])) {
  //   $output['title'] = $_GET['title'];
  // }
  // if(isset($_GET['id'])) {
  //   $sql .= "SELECT DISTINCT tb_product.product_id,
  //     (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
  //     tb_product.product_name,
  //     tb_brand.brand_name,
  //     tb_category.category_name,
  //     tb_product.product_date,
  //     tb_product.product_price,
  //     tb_product.product_quantity,
  //     tb_product.product_description
  //     FROM tb_product
  //     LEFT JOIN
  //     tb_brand
  //     ON
  //     tb_product.brand_id = tb_brand.brand_id
  //     LEFT JOIN
  //     tb_category
  //     ON
  //     tb_product.category_id = tb_category.category_id
  //     LEFT JOIN
  //     tb_img_product
  //     ON
  //     tb_product.product_id = tb_img_product.product_id
  //     WHERE tb_product.product_id = '".$_GET['id']."'";
  //     $result = $conn->query($sql);
  //     $arr = array();
  //     if ($result->num_rows > 0) {
  //       while($row = $result->fetch_assoc()) {
  //         array_push($arr,$row);
  //       }
  //     } 
  //     else {
  //       echo "0 results";
  //     }
  //     $output['data'] = $arr;
  //   }
  // echo json_encode($output);
  // $conn->close();
?>

<?php
  // header('Access-Control-Allow-Origin: *');
  // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  // include("./db_connect.php");

  // $sql = "";
  // $output = array();

  // if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //   $content = file_get_contents('php://input');
  //   $order = json_decode($content, true);
		
  //   $product_id = $order['id'];
  //   $title = $order['title'];

  //   if(isset($title)) {
  //     $output['title'] = $title;
  //   }
  //   if(isset($product_id)) {
  //     $sql .= "SELECT DISTINCT tb_product.product_id,
  //     (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
  //     tb_product.product_name,
  //     tb_brand.brand_name,
  //     tb_category.category_name,
  //     tb_product.product_date,
  //     tb_product.product_price,
  //     tb_product.product_quantity,
  //     tb_product.product_description
  //     FROM tb_product
  //     LEFT JOIN
  //     tb_brand
  //     ON
  //     tb_product.brand_id = tb_brand.brand_id
  //     LEFT JOIN
  //     tb_category
  //     ON
  //     tb_product.category_id = tb_category.category_id
  //     LEFT JOIN
  //     tb_img_product
  //     ON
  //     tb_product.product_id = tb_img_product.product_id
  //     WHERE tb_product.product_id = '$product_id'";
  //     $result = $conn->query($sql);
  //     $arr = array();
  //     if ($result->num_rows > 0) {
  //       $row = $result->fetch_assoc();
  //       $sqlimage = "SELECT img_pro_id, img_product FROM tb_img_product WHERE product_id = $row[product_id]";
  //       $resultimage = $conn->query($sqlimage);
  //       $arr_image = array();
  //       if ($resultimage->num_rows > 0) {
  //         while ($rowimage = $resultimage->fetch_assoc()) {
  //           array_push($arr_image, $rowimage);
  //         }
  //       }
  
  //       $jsonRow = array(
  //         "product_id" => $row["product_id"],
  //         "img_product" => $row["img_product"],
  //         "product_name" => $row["product_name"],
  //         "category_name" => $row["category_name"],
  //         "product_price" => $row["product_price"],
  //         "product_quantity" => $row["product_quantity"],
  //         "product_description" => $row["product_description"],
  //         "images" => $arr_image,
  //       );
  //       array_push($arr, $jsonRow);
  //     }
  //     $output['data'] = $arr;
  //   }   
  // } else {
  //   $output['status'] = "error";
  //   $output['message'] = "REQUEST_METHOD ผิดพลาด";
  // }
  // echo json_encode($output);
  // $conn->close();
?>

<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("./db_connect.php");

  $sql = "";
  $output = array();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = file_get_contents('php://input');
    $order = json_decode($content, true);
		
    $product_id = $order['id'];
    $title = $order['title'];

    if(isset($title)) {
      $output['title'] = $title;
    }
    if(isset($product_id)) {
      $sql .= "SELECT DISTINCT tb_product.product_id,
      (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
      tb_product.product_name,
      tb_brand.brand_name,
      tb_category.category_name,
      tb_product.product_date,
      tb_product.product_price,
      tb_product.product_discount,
      tb_product.product_quantity,
      tb_product.product_description
      FROM tb_product
      LEFT JOIN
      tb_brand
      ON
      tb_product.brand_id = tb_brand.brand_id
      LEFT JOIN
      tb_category
      ON
      tb_product.category_id = tb_category.category_id
      LEFT JOIN
      tb_img_product
      ON
      tb_product.product_id = tb_img_product.product_id
      WHERE tb_product.product_id = '$product_id'";
      $result = $conn->query($sql);
      $arr = array();
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sqlimage = "SELECT img_pro_id, img_product FROM tb_img_product WHERE product_id = $row[product_id]";
        $resultimage = $conn->query($sqlimage);
        $arr_image = array();
        if ($resultimage->num_rows > 0) {
          while ($rowimage = $resultimage->fetch_assoc()) {
            array_push($arr_image, $rowimage);
          }
        }
  
        $jsonRow = array(
          "product_id" => $row["product_id"],
          "product_name" => $row["product_name"],
          "brand_name" => $row["brand_name"],
          "category_name" => $row["category_name"],
          "product_date" => $row["product_date"],
          "product_price" => $row["product_price"],
          "product_discount" => $row["product_discount"],
          "product_quantity" => $row["product_quantity"],
          "product_description" => $row["product_description"],
          "img_product" => $row["img_product"],
          "images" => $arr_image,
        );
        array_push($arr, $jsonRow);
      }
      $output['data'] = $jsonRow;
    }   
  } else {
    $output['status'] = "error";
    $output['message'] = "REQUEST_METHOD ผิดพลาด";
  }
  echo json_encode($output);
  $conn->close();
?>