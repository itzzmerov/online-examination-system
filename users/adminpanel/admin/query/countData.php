<?php 

// Count All Course
$selCourse = $conn->query("SELECT COUNT(course_id) as totCourse FROM course_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Exam
$selExam = $conn->query("SELECT COUNT(exam_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);




 ?>