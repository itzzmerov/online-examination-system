<?php 
    $exmneId = $_SESSION['examineeSession']['exmne_id'];

    $selExmneeData = $conn->query("SELECT * FROM examinee_tbl WHERE student_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
    $exmneCourse =  $selExmneeData['student_course'];

    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE course_id='$exmneCourse' ORDER BY exam_id DESC ");
?>