<?php
session_start();

include("dbconnection.php");

$fromUser=$_POST["fromUser"];
$toUser=$_POST["toUser"];
$message=$_POST["message"];
if($message!=""){
$output="";
$sql="insert into messages(fromUser,toUser,message)Values('$fromUser','$toUser','$message');";

if($connection->query($sql)){
    $output="done";
}
else{
    $output="Error please , try again!!!";
}
echo $output; }
?>  