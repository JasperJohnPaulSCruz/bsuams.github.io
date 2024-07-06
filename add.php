<?php


include "connect.php";
include "sendmail.php";

date_default_timezone_set('Asia/Manila');

// Generate userid for student
$origid = uniqid();
$hashedid = md5($origid);//hashed id

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $tempname = $_POST['fname']." ".$_POST['mname']." ".$_POST['lname']." ".$_POST['suffix'];
    $name = ucwords($tempname);
    $student_number = $_POST['idnumber'];
    $email = $_POST['email'];
    $section = $_POST['section'];
    $groupnumber = $_POST['groupnumber'];

    $currentDate = date("y-m-d h:i:s"); 

    // Check if the user is exist 
    $query = "SELECT name, email FROM student WHERE name = '$name' AND email = '$email' limit 1";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 0){

        if (!empty($_FILES['studentavatar']['name'])) {
            $filename = $_FILES['studentavatar']['name'];
            $type = $_FILES['studentavatar']['type'];
            $tmp_name = $_FILES['studentavatar']['tmp_name'];
        
            // Directory where uploaded images will be saved
            $uploadDirectory = "avatar/student/$hashedid/";
            $targetPath = "";

            if (mkdir($uploadDirectory, 0777, true)) {
                $targetPath = $uploadDirectory . $filename;
            }
            
            if (move_uploaded_file($tmp_name, $targetPath)) {
                // Set permissions to 775
                if (chmod($targetPath, 0755)) {
                    echo "Permissions set to 755 successfully for $targetPath";
                } 
                // Image uploaded successfully, now insert into database
                $q = "INSERT INTO `avatar` (user_id, name,  path, datetime) VALUES ('$origid', '$filename', '$uploadDirectory', '$currentDate')";
                $q_result = mysqli_query($conn, $q);
        
                if ($q_result) {
                    echo "Image uploaded and data inserted into database successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        }
        
        $facultyName = $_SESSION['name'];

        $sql = "INSERT INTO `student`(user_id, name, email, student_number, section, group_no, student_of, datetime) VALUES ('$origid','$name ','$email','$student_number','$section','$groupnumber', '$facultyName', '$currentDate')";
        $sql_result = mysqli_query($conn, $sql);

        if ($sql_result) {

            echo sendMail($email, $hashedid, $name);

            if(isset($_POST['addstudent'])){

                if(isset($_SESSION['studentExist'])){
                    unset($_SESSION['studentExist']);
                }
                // header("Location: students");
                // exit;
            }
            
            else if(isset($_POST['addanother'])){

                if(isset($_SESSION['studentExist'])){
                    unset($_SESSION['studentExist']);
                }
                // header("Location: addstudent");
                // exit;

            }
                
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    
    }else{
        $_SESSION['studentExist'] = "Student is already exist.";

        header("Location: addstudent");
        exit;
    }

    
    mysqli_close($conn);
}