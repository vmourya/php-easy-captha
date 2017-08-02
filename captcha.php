<?php
session_start();
$code=substr(strtoupper(md5(rand(0,9999))),1,5);
$_SESSION["code"]=$code;
/*$im = imagecreatetruecolor(55, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255); //text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);*/

	header("Content-Type: image/png");
    $im = imagecreatefrompng('0'.rand(1,9).".png");
    $color = imagecolorallocate($im, 255, 255, 255);
	$fg = imagecolorallocate($im, 255, 255, 255); //text color white
    //imagefilledrectangle($im, 0, 0, 0,0, $color);
	printCaptchaCode($code,$im,$fg);
    imagepng($im);
	
    imagedestroy($im);
	function printCaptchaCode($cd,$im,$fg){
		$left = 5;
		for($i=1; $i <= strlen($cd); $i++){
			$temp = substr($cd,$i-1,1);
			$top = ($i%2 == 0) ?  2 : 5;
			imagestring($im, 5 , $left , $top, $temp, $fg);
			$left = $left + 9;
		}
	}


?>