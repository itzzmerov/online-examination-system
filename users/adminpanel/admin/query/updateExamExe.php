<?php 
 include("../../../conn.php");
 
 extract($_POST);


 $updExam = $conn->query("UPDATE exam_tbl SET course_id='$courseId', exam_title='$examTitle', exam_time_limit='$examLimit', exam_questionlimit_display='$examQuestDipLimit' , exam_description='$examDesc' WHERE  exam_id='$examId' ");

 if($updExam)
 {
   $res = array("res" => "success", "msg" => $examTitle);
 }
 else
 {
   $res = array("res" => "failed");
 }

 echo json_encode($res);
 ?>