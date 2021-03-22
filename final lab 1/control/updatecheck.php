<?php
include('../model/db.php');


 $error="";

if (isset($_POST['update'])) {
if (empty($_POST['firstname']) || empty($_POST['email'])) {
$error = "input given is invalid";
}
else
{
$connection = new db();
$conobj=$connection->OpenCon();
$interest = "";
foreach($_POST["interest"] as $itemp){
    $interest.= $itemp."+";
}

$userQuery=$connection->UpdateUser($conobj,"student",$_SESSION["username"],$_POST['firstname'],$_POST['email'],
   $_POST['username'],$_POST['password'],$_POST['address'],$_POST['dob'],$interest,$_POST['gender']);


if($userQuery==TRUE)
{
    echo "update successful"; 
}
else
{
    echo "could not update";    
}
$connection->CloseCon($conobj);

}
}


?>
