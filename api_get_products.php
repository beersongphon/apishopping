<?php
//   header('Access-Control-Allow-Origin: *');
//   include("./db_connect.php");
//   $sql = "";
//   $output = array();

//   if(isset($_GET['title'])) {
//     $output['title'] = $_GET['title'];
//   }
//   if(isset($_GET['id'])) {
//     $output['id'] = $_GET['id'];
//     $sql .= "SELECT DISTINCT tb_product.product_id,
//       (SELECT DISTINCT tb_img_product.img_product FROM tb_img_product WHERE tb_img_product.product_id = tb_product.product_id LIMIT 1) AS img_product,
//       tb_product.product_name,
//       tb_brand.brand_name,
//       tb_category.category_name,
//       tb_product.product_date,
//       tb_product.product_price,
//       tb_product.product_quantity,
//       tb_product.product_description
//       FROM tb_product
//       LEFT JOIN
//       tb_brand
//       ON
//       tb_product.brand_id = tb_brand.brand_id
//       LEFT JOIN
//       tb_category
//       ON
//       tb_product.category_id = tb_category.category_id
//       LEFT JOIN
//       tb_img_product
//       ON
//       tb_product.product_id = tb_img_product.product_id
//       WHERE tb_product.product_id = '".$_GET['id']."'";
//       $result = $conn->query($sql);
//       $arrRes = array("user" => array());
//       $arr = array();
//       if ($result->num_rows > 0) {
//         while($row1 = $result->fetch_assoc()) {
//             $sqls = "SELECT * FROM tb_img_product
//             WHERE product_id = '".$_GET['id']."'";
//             $result2 = $conn->query($sqls);
//             $arrImg = array();
//             if ($result2->num_rows > 0) {
//                 while($row2 = $result2->fetch_assoc()) {
//                     // $row2 = $result2->fetch_assoc(); 
//                     $imageRes = array();   
//                     array_push($arrImg,$row2);      
//                 }     
//             }

//             $jsonRow =array(
//                 "product_id"=> $row1 ["product_id"],
//                 "product_name"=> $row1 ["product_name"],
//                 "image"=> $arrImg
//             );
//         }
//       } 
//       else {
//         echo "0 results";
//       }
//       $output['data'] = $jsonRow;
//     }
//   echo json_encode($output);
//   $conn->close();
?>
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
  WHERE tb_product.product_quantity NOT IN ('0')
  ORDER BY tb_product.product_id DESC
  LIMIT 8";
$result = $conn->query($sql);
$arrRes = array("user" => array());
$arr_data = array();
if ($result->num_rows > 0) {
  while ($row1 = $result->fetch_assoc()) {
    $sqls = "SELECT * FROM tb_img_product WHERE product_id = $row1[product_id]";
    $result2 = $conn->query($sqls);
    $arr_image = array();
    if ($result2->num_rows > 0) {
      while ($row2 = $result2->fetch_assoc()) {
        array_push($arr_image, $row2);
      }
    }

    $jsonRow = array(
      "product_id" => $row1["product_id"],
      "image" => $arr_image,
      "product_name" => $row1["product_name"],
      // "brand_name"=> $row1["brand_name"],
      "category_name" => $row1["category_name"],
      // "product_date"=> $row1["product_date"],
      "product_price" => $row1["product_price"],
      "product_quantity" => $row1["product_quantity"],
      "product_description" => $row1["product_description"]
    );
    array_push($arr_data, $jsonRow);
  }
}
echo json_encode($arr_data);
?>

<?php
//   header('Access-Control-Allow-Origin: *');
//   header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

//   include('./db_connect.php');

//   $sql = "SELECT * FROM tb_product
//       LEFT JOIN
//       tb_img_product
//       ON
//       tb_product.product_id = tb_img_product.product_id
//       LEFT JOIN
//       tb_category
//       ON
//       tb_product.category_id = tb_category.category_id
//       WHERE tb_product.product_quantity NOT IN ('0')
//       ORDER BY tb_product.product_id DESC
//       LIMIT 8";

// 	$result = $conn->query($sql);
// 	$arr_data = array();
//     $arrRes = array("user" => array());
// 	if ($result->num_rows > 0) {
// 	  // output data of each row
// 	  while($row = $result->fetch_assoc()) {
//         $imageRes = array($row["img_product"]);
//         $jsonRow =array(
//             "product_id"=> $row ["product_id"],
//             "product_name"=> $row ["product_name"],
//             "image"=> $imageRes
//         );
//         array_push($arrRes["user"], $jsonRow);
// 		// array_push($arr_data,$row);
// 	  }
// 	}
// 	echo json_encode($jsonRow);
// 	$conn->close();
?>
