<!DOCTYPE html>
<html>

<head>
	<title>YULASHAROWIN :  SAVE</title>
	<meta charset="utf-8">
	<meta name="viewport" content=" initial-scale=1, user-scalable=no"> 
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	 <!-- <link rel="stylesheet" href="css/jquery-ui.css"> -->
	<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
	 <script src="js/jquery-1.8.2.min.js"></script> 
	<script src="js/jquery.mobile-1.3.0.min.js"></script>
	 <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>  -->
	   <!--  <script src="js/jquery-ui.js"></script> -->
	 
	<!-- Favicon -->
  <link rel="shortcut icon" href="images/logo.ico">


  <style>
  .ui-btn-up-g, .ui-btn-hover-g, .ui-btn-down-g
			{
		color: white;
		font-weight: bold;
		text-decoration: none;
	}

	.ui-btn-up-g
	{
	border: 1px solid #397114;
	background: #5aab25;
	text-shadow: 0 -1px 1px #397114;
	background-image: -moz-linear-gradient(top, #7ec44f, #5aab25);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #87c45e), color-stop(1, #619e39));
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#7ec44f', EndColorStr='#5aab25')";
	}

	.ui-btn-hover-g
	{
	border: 1px solid #2c6e00;
	background: #75b54a;
	text-shadow: 0 -1px 1px #2a6901;
	background-image: -moz-linear-gradient(top, #99d472, #75b54a);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #99d472), color-stop(1, #75b54a));
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#99d472', EndColorStr='#75b54a')";
	}

	.ui-btn-down-g
	{
	border: 1px solid #457823;
	background: #7ec44f;
	text-shadow: 0 -1px 1px #457823;
	background-image: -moz-linear-gradient(top, #619e39, #7ec44f);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #619e39), color-stop(1, #7ec44f));
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#619e39', EndColorStr='#7ec44f')";
	}

	.ui-btn-up-g, .ui-btn-hover-g, .ui-btn-down-g
	{
	color: white;
	font-weight: bold;
	text-decoration: none;
	}
  </style>
</head>

<body>
	
<?php
try {
		$date = date("Y-m-d H:i:s", strtotime('+7 hours'));
require_once('database/config2.php');

$resultArray = array();





$strSQL = "INSERT INTO `testp`(`name`, `created_when`) VALUES ('".$_POST["txtName"]."','".$_POST["txtTime"]."')";




 //$conn->exec($strSQL);
 $conn->query($strSQL);

//สร้างโฟลเดอร์อัตโนมัติโดยตั้งชื่อตามว/ด/ป
//date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d H:i:s", strtotime('+7 hours'));
//$date =date('Y-m-d H:i:s');
mkdir("payment/$date");

$target_dir = "payment/$date/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}




// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//	move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);

}

}
	catch(PDOException $e)
	{
		//echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
	}
	$conn = null;
?>
<script type="text/javascript">
alert("Save Complete");
    window.location = "testP.php";
		</script>


</body>	
</html>
