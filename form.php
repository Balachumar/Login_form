<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = htmlspecialchars($_POST['student_name']);
    $father_name = htmlspecialchars($_POST['father_name']);
    $marks = [];
    $total_marks = 0;

    for ($i = 1; $i <= 7; $i++) {
        $subject_key = "subject" . $i;
        $mark = $_POST[$subject_key];
        $marks[$subject_key] = $mark;
        $total_marks += $mark;
    }

    $max_total = 7 * 100;
    $percentage = ($total_marks / $max_total) * 100;

    if ($percentage >= 90) {
        $grade = "A+";
    } elseif ($percentage >= 80) {
        $grade = "A";
    } elseif ($percentage >= 70) {
        $grade = "B";
    } elseif ($percentage >= 60) {
        $grade = "C";
    } elseif ($percentage >= 50) {
        $grade = "D";
    } else {
        $grade = "F";
    }

    echo "<h2>Student Report</h2>";
    echo "Student Name: <strong>$student_name</strong><br>";
    echo "Father's Name: <strong>$father_name</strong><br><br>";

    foreach ($marks as $subject => $mark) {
        echo ucfirst($subject) . ": $mark<br>";
    }

    echo "<br>Total Marks: $total_marks / $max_total<br>";
    echo "Percentage: " . round($percentage, 2) . "%<br>";
    echo "Grade: <strong>$grade</strong>";
} else {
    echo "Invalid Request";
}
?>
