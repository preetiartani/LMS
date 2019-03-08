<?php
include "connection.php";
session_start();
if(isset($_POST["submit2"])){
            $exp_ret_date = date("d-m-Y");
//            echo "$exp_ret_date";
            $query = "select student_user_name from message where expected_return_date = '$exp_ret_date'";
            $result = mysqli_query($link,$query);
//            $r = mysqli_num_rows($result);
//            echo "$r";
    if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_array($result)){
            $username = $row['student_user_name'];
            $query1 = "select contact from student_registration where username = '$username'";
            $result2 = mysqli_query($link,$query1);
            $row2 = mysqli_fetch_array($result2);
            $phone_number = $row2['contact'];
            
//            echo $_SESSION["phone_no"];
//          header("Location: reminder.php");
//            exit();
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=MSGIND&route=4&mobiles=".$phone_number."&authkey=243436AORq1TmNv2hr5bc8a667&message=Dear Student, Today is the last day to return your book.",
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
//            } else{
////            header("Location: display_student_info.php");
//            }
        }

    }
            header("Location: display_student_info.php");
}
}


//
//<!--session_start();-->
//<!--
//$phone_number = $_SESSION["phone_no"];
////require_once("login.php");
////echo "$phone_number";
//
////$curl = curl_init();
////
////curl_setopt_array($curl, array(
////   CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=MSGIND&route=4&mobiles=".$phone_number."&authkey=243436AORq1TmNv2hr5bc8a667&message=Hello! This is a test message",
////  CURLOPT_RETURNTRANSFER => true,
////  CURLOPT_ENCODING => "",
////  CURLOPT_MAXREDIRS => 10,
////  CURLOPT_TIMEOUT => 30,
////  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
////  CURLOPT_CUSTOMREQUEST => "GET",
////  CURLOPT_SSL_VERIFYHOST => 0,
////  CURLOPT_SSL_VERIFYPEER => 0,
////));
////$response = curl_exec($curl);
////$err = curl_error($curl);
////
////curl_close($curl);
////
////if ($err) {
////  echo "CURL Error #:" . $err;
////} else{
////header("Location: display_student_info.php");
////}
//-->
?>