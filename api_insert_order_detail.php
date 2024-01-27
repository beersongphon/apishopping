<?php
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
// date_default_timezone_set("Asia/Bangkok");

// include("db_connect.php");

// if($_SERVER["REQUEST_METHOD"] == "POST"){
// 	$content = file_get_contents('php://input');
// 	$order = json_decode($content, true);

// 	$order_id = $order['order_id'];
// 	$product_id = $order['product_id'];
// 	$order_price = $order['order_price'];
// 	$order_quantity = $order['order_quantity'];
//     for($i=1;$i<=$order_id;$i++)
//     {
//         $sql = "INSERT INTO tb_order_detail(order_id, product_id, order_price, order_quantity)  
//         VALUES('$order_id', '$product_id', '$order_price', '$order_quantity')";
//         $result = $conn->query($sql);
//     }


// 	if ($result){
// 			echo json_encode(['status'=>'success','message'=>'บันทึกข้อมูลสำเร็จ']);
// 	}
// 	else{
// 			echo json_encode(['status'=>'error','message'=>'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
// 	}

// }
// else{
// 	echo json_encode(['status'=>'error','message'=>'REQUEST_METHOD ผิดพลาด']);
// }
// $conn->close();
?>

<?php
//   header('Access-Control-Allow-Origin: *');
//   header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
//   date_default_timezone_set("Asia/Bangkok");

//   include("db_connect.php");

//   if($_SERVER["REQUEST_METHOD"] == "POST"){

//     $query = '';
//     $table_data = '';
//     $content = file_get_contents('php://input');
//     $order = json_decode($content, true);

//     foreach($order as $row) {
//       $order_id = $row['order_id'];
//       $product_id = $row['product_id'];
//       $order_price = $row['order_price'];
//       $order_quantity = $row['order_quantity'];

//       $query .= "INSERT INTO tb_order_detail(order_id, product_id, order_price, order_quantity)  
//         VALUES('$order_id', '$product_id', '$order_price', '$order_quantity')";
//         $table_data .= '
//         <tr>
//             <td>'.$row["order_id"].'</td>
//             <td>'.$row["product_id"].'</td>
//             <td>'.$row["order_price"].'</td>
//             <td>'.$row["order_quantity"].'</td>
//         </tr>';
//     }
//     $result = mysqli_multi_query($conn, $query);
//     if ($result){

//                 echo '<h3>Inserted JSON Data</h3><br />';
//                 echo '
//                 <table class="table table-bordered">
//                 <tr>
//                     <th width="45%">Name</th>
//                     <th width="10%">Gender</th>
//                     <th width="45%">Subject</th>
//                 </tr>
//                 ';
//                 echo $table_data;  
//                 echo '</table>';
//       echo json_encode(['status'=>'success','message'=>'บันทึกข้อมูลสำเร็จ']);
//     } else {
//       echo json_encode(['status'=>'error','message'=>'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
//     }
//   } else {
//     echo json_encode(['status'=>'error','message'=>'REQUEST_METHOD ผิดพลาด']);
//   }
//   $conn->close();
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

    $content = file_get_contents('php://input'); //Read the JSON file in PHP
    $array = json_decode($content, true); //Convert JSON String into PHP Array
    foreach ($array as $row) {
        $order_id = $row['order_id'];
        $product_id = $row['product_id'];
        $order_price = $row['order_price'];
        $order_quantity = $row['order_quantity'];
        $sql .= "INSERT INTO tb_order_detail(order_id, product_id, order_price, order_quantity) 
        VALUES ('$order_id', '$product_id', '$order_price', '$order_quantity');"; // Make Multiple Insert Query 
        $arr_data = array();
        $jsonRow = array(
            "order_id"=> $order_id,
            "product_id"=> $product_id,
            "order_price"=> $order_price,
            "order_quantity"=> $order_quantity
        );
        // $table_data .= array_push($arr_data,$sql); //Data for display on Web page
        // $table_data .= array_push($arr_data, $jsonRow);
        $table_data .= '
            <tr>
                <td>' . $row["order_id"] . '</td>
                <td>' . $row["product_id"] . '</td>
                <td>' . $row["order_price"] . '</td>
                <td>' . $row["order_quantity"] . '</td>
            </tr>
           '; //Data for display on Web page
    }
    $result = $conn->multi_query($sql);
    if ($result) {
        // echo $table_data;
        // echo json_encode([$jsonRow]);
        echo json_encode(['status'=>'success','message'=>'บันทึกข้อมูลสำเร็จ']);
    } else {
        echo json_encode(['status'=>'error','message'=>'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
    }
} else {
  echo json_encode(['status' => 'error', 'message' => 'REQUEST_METHOD ผิดพลาด']);
}
$conn->close();

?>

 