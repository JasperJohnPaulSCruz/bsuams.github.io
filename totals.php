<?php

include "connect.php";

$total_student = 0;
$present = 0;
$late = 0;
$absent = 0;

$section = $_SESSION['section'];
$group_no = $_SESSION['groupnumber'];

$t_query = "Select * from attendance_log where section = '$section' and group_no = '$group_no'";
$t_result = mysqli_query($conn, $t_query);

if(mysqli_num_rows($t_result)>0){
    $total_student = mysqli_num_rows(($t_result));
}

$p_query = "Select * from attendance_log where status = 'present' and section = '$section' and group_no = '$group_no'";
$p_result = mysqli_query($conn, $p_query);

if(mysqli_num_rows($p_result)>0){
    $present = mysqli_num_rows(($p_result));
}

$l_query = "Select * from attendance_log where status = 'late' and section = '$section' and group_no = '$group_no'";
$l_result = mysqli_query($conn, $l_query);

if(mysqli_num_rows($l_result)>0){
    $late = mysqli_num_rows(($l_result));
}

$a_query = "Select * from attendance_log where status = 'absent' and section = '$section' and group_no = '$group_no'";
$a_result = mysqli_query($conn, $a_query);

if(mysqli_num_rows($a_result)>0){
    $absent = mysqli_num_rows(($a_result));
}