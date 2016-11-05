<?php
	header('Access-Control-Allow-Origin:*'); 
	$con = mysqli_connect("localhost","root","root","meerkat");
	if($_POST['image']){
		$data = $_POST['image'];
		$timeimg = $_POST['timeimg'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$filename = $timeimg.".jpg";
		file_put_contents("img/analyze/".$filename, $data);
		$filepath = "img/analyze/".$filename;
		$sql = "INSERT INTO analyze_img (img_name, img_path, timeimg) VALUES ('$filename','$filepath','$timeimg')";
		$result = mysqli_query($con,$sql);
		var_dump($result);
	}else{
		$message = "wrong answer";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>