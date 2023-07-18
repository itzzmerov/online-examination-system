<?php 
 include("../../../conn.php");


extract($_POST);

$delExam = $conn->query("DELETE FROM exam_question_tbl WHERE question_id='$id'  ");
if($delExam)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>