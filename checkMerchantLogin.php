<?php
include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect();
$user_id=$_POST['user_id'];

$query="SELECT user_id FROM me_login WHERE user_id='".$user_id."'";
$result=$myCon->query($query);
$count=mysqli_num_rows($result);
if($count>=1){
    echo 'exist';
}else{
    echo 'not_exist';
}




?>