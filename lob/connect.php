<?php
session_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
$database = "stockiyn_lob";
$username = "stockiyn_lob"; 
$password = "wDm22BijT";

$con = mysqli_connect($servername , $username , $password , $database);
$con -> set_charset("utf8");


function send_line_notify($message, $token)
{
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
$headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $ch );
curl_close( $ch );

return $result;
}






?>
