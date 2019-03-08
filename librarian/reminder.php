<?php
session_start();
$phone_number = $_SESSION["phone_no"];
//require_once("login.php");
//echo "$phone_number";

$curl = curl_init();

curl_setopt_array($curl, array(
   CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=MSGIND&route=4&mobiles=".$phone_number."&authkey=243436AORq1TmNv2hr5bc8a667&message=Hello! This is a test message",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "CURL Error #:" . $err;
} else{
header("Location: display_student_info.php");
}
?>