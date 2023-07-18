<?php
 	session_start(); 
 	include("../conn.php");
 	extract($_POST);

 	$exmne_id = $_SESSION['examineeSession']['exmne_id'];



	$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE student_id='$exmne_id' AND exam_id='$exam_id'  ");

	$selAns = $conn->query("SELECT * FROM exam_answers WHERE student_id='$exmne_id' AND exam_id='$exam_id' ");


	if($selExAttempt->rowCount() > 0) {
		$res = array("res" => "alreadyTaken");
	} else if($selAns->rowCount() > 0) {
		$updLastAns = $conn->query("UPDATE exam_answers SET answer_status='old' WHERE student_id='$exmne_id' AND exam_id='$exam_id'  ");
		if($updLastAns) {
			foreach ($_REQUEST['answer'] as $key => $value) {
			 	$value = $value['correct'];
		  	 	$insAns = $conn->query("INSERT INTO exam_answers(student_id,exam_id,question_id,exam_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
			}
			if($insAns) {
			 	$insAttempt = $conn->query("INSERT INTO exam_attempt(student_id,exam_id)  VALUES('$exmne_id','$exam_id') ");
			 	if($insAttempt) {
				 	$res = array("res" => "success");
			 	} else {
				 	$res = array("res" => "failed");
				}
			} else {
			 	$res = array("res" => "failed");
			}
		}
	} else {
		foreach ($_REQUEST['answer'] as $key => $value) {
			$value = $value['correct'];
		  	$insAns = $conn->query("INSERT INTO exam_answers(student_id,exam_id,question_id,exam_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
		}
		if($insAns) {
			$insAttempt = $conn->query("INSERT INTO exam_attempt(student_id,exam_id)  VALUES('$exmne_id','$exam_id') ");
			if($insAttempt){
				$res = array("res" => "success");
			} else {
				$res = array("res" => "failed");
			}
		} else {
			$res = array("res" => "failed");
		}
	}
 	echo json_encode($res);
?> 