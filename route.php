<?php

$request = $_SERVER["REQUEST_URI"];
$router = str_replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '', $request);

if($router == '/' || $router == '' || $router == 'home'){
    include 'index.php';
    exit;

}
else if($router == 'students'){
    include 'views/students.php';
    exit;

}
else if($router == 'inventory'){
    include 'views/inventory.php';
    exit;

}
else if($router == 'addstudent'){
    include 'views/addstudent.php';
    exit;

}
else if($router == 'attendanceoverview'){
    include 'views/attendanceoverview.php';
    exit;

}
// admin
else if($router == 'users'){
    include 'views/admin/user.php';
    exit;

}

else if($router == 'inventoryadmin'){
    include 'views/admin/inventory.php';
    exit;

}
else{
    include '404.php';
    exit;
}