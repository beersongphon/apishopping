<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

include("db_connect.php");
$output = array(
  "status" => "error"
);

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  $content = file_get_contents('php://input');
  $order = json_decode($content, true);

  $action_type = $order['action_type'];
  $user_id = $order['user_id'];

  if ($action_type == "A") {
    $sql = "UPDATE tb_user SET ";
    if (isset($user_id)) {
      if (isset($order['user_firstname'])) {
        $sql .= "user_firstname = '$order[user_firstname]', ";
      }
      if (isset($order['user_lastname'])) {
        $sql .= "user_lastname = '$order[user_lastname]', ";
      }
      if (isset($order['user_address'])) {
        $sql .= "user_address = '$order[user_address]', ";
      }
      if (isset($order['user_tel'])) {
        $sql .= "user_tel = '$order[user_tel]', ";
      }
      if (isset($order['user_email'])) {
        $sql .= "user_email = '$order[user_email]', ";
      }
      if (isset($order['user_sex'])) {
        $sql .= "user_sex = '$order[user_sex]', ";
      }
      if (isset($order['user_username'])) {
        $sql .= "user_username = '$order[user_username]', ";
      }
      if (isset($order['permission_id'])) {
        $sql .= "permission_id = '$order[permission_id]'";
      }
      $sql .= " WHERE user_id = '$user_id'";
    }
    $result = $conn->query($sql);
    if ($result) {
      $output['status'] = "success";
      $output['message'] = "บันทึกข้อมูลสำเร็จ";
    } else {
      $output['message'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
    }
  } else if ($action_type == "B") {
    extract($order);
    if (md5(isset($order['old_password'])) != "" && md5(isset($order['user_password'])) != "" && md5(isset($order['confirm_password'])) != "") {
      // $user_id = '1'; // sesssion id
      $user_id = $order['user_id'];
      // $old_password = md5($order['old_password']);
      // $user_password = md5($order['user_password']);
      // $confirm_password = md5($order['confirm_password']);
      // $old_pwd = md5(mysqli_real_escape_string($db, $_POST['old_password']));
      // $pwd = md5(mysqli_real_escape_string($db, $_POST['password']));
      // $c_pwd = md5(mysqli_real_escape_string($db, $_POST['confirm_password']));
      if (md5(isset($order['user_password'])) == md5(isset($order['confirm_password']))) {
        if (md5($order['user_password']) != md5($order['old_password'])) {
          $sql = "SELECT * FROM tb_user WHERE user_id = '$user_id' AND user_password = '" . md5($order['old_password']) . "'";
          $result = $conn->query($sql);
          $count = mysqli_num_rows($result);
          if ($count == 1) {
            $sqlup = "UPDATE tb_user SET user_password = '" . md5($order['user_password']) . "' WHERE user_id = '$user_id'";
            $fetch = $conn->query($sqlup);
            // $msg_sucess = "Your new password update successfully.";
            $output['status'] = "success";
            $output['message'] = "Your new password update successfully.";
          } else {
            // $error = "The password you gave is incorrect.";
            $output['message'] = "The password you gave is incorrect.";
          }
        } else {
          // $error = "Old password new password same Please try again.";
          $output['status'] = "error";
          $output['message'] = "Old password new password same Please try again.";
        }
      } else {
        // $error = "New password and confirm password do not matched";
        $output['message'] = "New password and confirm password do not matched";
      }
    } else {
      // $error = "Please fil all the fields";
      $output['message'] = "Please fil all the fields";
    }
  }
} else {
  $output['message'] = "REQUEST_METHOD ผิดพลาด";
}
echo json_encode($output);
$conn->close();
?>
