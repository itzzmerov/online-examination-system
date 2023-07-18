<?php 
 include("../../../conn.php");


extract($_POST);

$delCourse = $conn->query("DELETE FROM course_tbl WHERE course_id='$id'  ");
if($delCourse)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}



	echo json_encode($res);
 ?>