<?php
$uploadFile = basename($_FILES['uploadme']['name']);
if (!empty($uploadFile)) {
	$tempFile = $_FILES['uploadme']['tmp_name'];
	$src = imagecreatefromjpeg($tempFile);

	//Large file is 400px Wide
	list($width,$height) = getimagesize($tempFile);
	$newwidth = 400;
	$newheight = ($height/$width)*400;
	$tmp = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	chdir("../products");
	$uploadFolder = "large/";
	$uploadPath = $uploadFolder . $uploadFile; 

	$filename = $uploadFolder. $_FILES['uploadme']['name'];
	imagejpeg($tmp,$filename,100);

	// Small File: 100px wide
	list($width,$height)=getimagesize($tempFile);
	$newwidth=100;
	$newheight=($height/$width)*100;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

	chdir("../products");
	$uploadFolder = "small/";
	$uploadPath = $uploadFolder . $uploadFile; 

	$filename = $uploadFolder. $_FILES['uploadme']['name'];
	imagejpeg($tmp,$filename,100);

	imagedestroy($src);
	imagedestroy($tmp);
	}
?>