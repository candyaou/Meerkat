<?php
	header('Access-Control-Allow-Origin:*'); 
	$con = mysqli_connect("localhost","root","root","meerkat");
	if($_POST['image']){
		$data = $_POST['image'];
		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$filename = $Fname."_".$Lname.".jpg";
		file_put_contents("img/meerkat/".$filename, $data);
		$filepath = "img/meerkat/".$filename;
		$sql = "INSERT INTO meerkat (img_name, img_path, Fname, Lname) VALUES ('$filename','$filepath','$Fname','$Lname')";
		$result = mysqli_query($con,$sql);
	}else{
		$message = "wrong answer";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>