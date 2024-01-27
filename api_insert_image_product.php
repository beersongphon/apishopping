<?php
//   header("Access-Control-Allow-Origin: *");
//   header("Access-Control-Allow-Methods: PUT, GET, POST");
//   header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//   if($_SERVER["REQUEST_METHOD"] == "POST") {
//     $folderPath = "files/";
//     $postdata = file_get_contents("php://input");
//     $request = json_decode($postdata);
//     foreach ($request->fileSource as $key => $value) {
//       $image_parts = explode(";base64,", $value);
//       $image_type_aux = explode("image/", $image_parts[0]);
//       $image_type = $image_type_aux[1];
//       $image_base64 = base64_decode($image_parts[1]);
//       $file = $folderPath . uniqid() . '.'.$image_type;
//       file_put_contents($file, $image_base64);
//     }
//   }
//   echo json_encode($image_parts);
?>

<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
date_default_timezone_set("Asia/Bangkok");

include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = '';
    $table_data = '';

    $folderPath = "upload/";
    $content = file_get_contents('php://input'); //Read the JSON file in PHP
    $array = json_decode($content, true); //Convert JSON String into PHP Array
    foreach ($array as $row) {
        // $image_parts = explode(";base64,", $row['img_product']);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_base64 = base64_decode($image_parts[1]);
        // $file = $folderPath . uniqid() . '.png';
        // $files = uniqid() . '.png';
        $image_parts = explode(";base64,", $row['img_product']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;

        $product_id = $row['product_id'];
        if (file_put_contents($file, $image_base64)) {
            $sql .= "INSERT INTO tb_img_product (img_product, product_id) VALUES 
            ('".substr($file,7)."', 
            '$product_id');";
            // $table_data .= array_push($arr_data,$sql); //Data for display on Web page
            // $table_data .= array_push($arr_data, $jsonRow);
            $table_data .= '
            <tr>
                <td>' . $row["img_product"] . '</td>
                <td>' . $row["product_id"] . '</td>
            </tr>
           '; //Data for display on Web page
        }
    }
    $result = $conn->multi_query($sql);
    if ($result) {
        // echo $table_data;
        // echo json_encode([$jsonRow]);
        echo json_encode(['status' => 'success', 'message' => 'บันทึกข้อมูลสำเร็จ']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'REQUEST_METHOD ผิดพลาด']);
}
$conn->close();

?>
