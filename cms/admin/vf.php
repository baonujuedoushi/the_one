<?php
session_start();
header('content-type:image/jpeg');


$image=imagecreatetruecolor(80,30);
$white=imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $white);
$color=imagecolorallocate($image,mt_rand(0,190),mt_rand(0,190),mt_rand(0,190));
$str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$a='';

for($i=0;$i<4;$i++){
	$color=imagecolorallocate($image,mt_rand(0,190),mt_rand(0,190),mt_rand(0,190));
	$x=8+18*$i;
	$text=substr($str,mt_rand(0,strlen($str)-1),1);
	$a.=$text;
	imagettftext($image, 18, mt_rand(-15,15), $x, 24, $color,'msyh.ttf', $text);
	
}
$a=strtolower($a);
$_SESSION['vf']=$a; 

for($n=0;$n<200;$n++){
	imagesetpixel($image, mt_rand(0,79), mt_rand(0,29), $color);
}
for($n=0;$n<5;$n++){
	imageline($image, mt_rand(0,79), mt_rand(0,29), mt_rand(0,79), mt_rand(0,29), $color);
}
imagejpeg($image);
imagedestroy($image);