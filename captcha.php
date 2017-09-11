<?php
session_start();
$code=substr(strtoupper(md5(rand(0,9999))),1,6);
$_SESSION["easyCaptchaCode"]=$code;
header("Content-Type: image/png");
$im = imagecreatetruecolor(65, 24);
$baseR = 255 - rand(0, 100);
$baseG = 255 - rand(0, 50);
$baseB = 255 - rand(0, 60);
for($i=0; $i<50; $i++):
  for($j=0; $j<50; $j++):
    $val = floor(100 * (rand(0, 100) / 100)); //value will always be within the range of 1-100
    $r = $baseR - $val;
    $g = $baseG - $val;
    $b = $baseB - $val;
    $color = imagecolorallocate($im, $r, $g, $b);     
    imagefilledellipse($im, rand(0,65), rand(0,24), rand(0,10), rand(0,50), $color);
  endfor;
endfor;
$fg = imagecolorallocate($im, 0, 0, 0); //text color white
printCaptchaCode($code,$im,$fg);
imagepng($im);
imagedestroy($im);
function printCaptchaCode($cd,$im,$fg){
  $left = 5;
  for($i=1; $i <= strlen($cd); $i++){
    $temp = substr($cd,$i-1,1);
    $top = ($i%2 == 0) ?  2 : 5;
    imagestring($im, 20 , $left , $top, $temp, $fg);
    $left = $left + 7;
  }
}


?>