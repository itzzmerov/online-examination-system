<?php
 include("../../../conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE examinee_tbl SET student_fullname='$exFullname', student_course='$exCourse', student_sex='$exGender', student_birthdate='$exBdate', student_year_level='$exYrlvl', student_email='$exEmail', student_password='$exPass' WHERE student_id='$exmne_id' ");
if($updCourse)
{
	   $res = array("res" => "success", "exFullname" => $exFullname);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>