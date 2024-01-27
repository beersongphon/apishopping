<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

  include("db_connect.php");

  $output = array(
    "status" => "error"
  );

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = '';
    $table_data = '';

    $content = file_get_contents('php://input'); //Read the JSON file in PHP
    $array = json_decode($content, true); //Convert JSON String into PHP Array
    foreach ($array as $row) {
        $img_pro_id = $row['img_pro_id'];

        $sql .= "DELETE FROM tb_img_product WHERE img_pro_id = '$img_pro_id';";
        $table_data .= '
            <tr>
                <td>' . $row["img_pro_id"] . '</td>
            </tr>
           '; //Data for display on Web page

    }
    $result = $conn->multi_query($sql);
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

<?php
//   header('Access-Control-Allow-Origin: *');
//   header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

//   include("db_connect.php");

//   $output = array(
//     "status" => "error"
//   );

//   if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $content = file_get_contents('php://input'); //Read the JSON file in PHP
//     $image = json_decode($content, true); //Convert JSON String into PHP Array
    
//     $product_id = $image['product_id'];

//     $sql = "DELETE FROM tb_img_product WHERE product_id = '$product_id'";
//     $result = $conn->query($sql);
//     if ($result) {
//       $output['status'] = "success";
//       $output['message'] = "บันทึกข้อมูลสำเร็จ";
//     } else {
//       $output['message'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
//     }
//   } else {
// 	$output['message'] = "REQUEST_METHOD ผิดพลาด";
//   }
//   echo json_encode($output);
// $conn->close();
?>