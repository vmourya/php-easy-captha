<?php
session_start();

if(isset($_POST["captcha"]) && $_POST["captcha"]!=""&& $_SESSION["easyCaptchaCode"]==$_POST["captcha"])
{
  echo "Correct Code Entered";
//Do you stuff
}
else
{
  die("Wrong Code Entered");
}
?>