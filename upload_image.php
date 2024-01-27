<?php 
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// Count total files
$countfiles = count($_FILES["files"]["name"]);

// Upload directory
$upload_location = "uploads/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

	if(isset($_FILES["files"]["name"][$index]) && $_FILES["files"]["name"][$index] != ""){

    	// File name
    	$filename = $_FILES["files"]["name"][$index];
		
		$filename = (string) (time() + rand(10, 10000000)) . $filename;
    	// Get extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Valid image extension
        $valid_ext = array("png","jpeg","jpg");

        // Check extension
        if(in_array($ext, $valid_ext)){

        	// File path
        	$path = $upload_location.$filename;

            // Upload file
    		if(move_uploaded_file($_FILES["files"]["tmp_name"][$index],$path)){
    			$files_arr[] = $filename;
    		}
        }
    }
			   	
}

echo json_encode($files_arr);
die;

?>
<?php
    // $target_dir = "uploads/"; //image upload folder name
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // //moving multiple images inside folder
    // if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //     $data = array("data" => "File is valid, and was successfully uploaded.");
    //     print json_encode($data);
    // }
?>