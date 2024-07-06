<?php

include "connect.php";

    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];

    $query = "SELECT * from attendance_log where section = '$section' and group_no = '$group_no'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $status = $row['status'];
            $attendatetime = $row['attendatetime'];

            $s_query = "SELECT * from student where user_id = '$user_id' limit 1";
            $s_result = mysqli_query($conn, $s_query);

            if($s_result && mysqli_num_rows($s_result) > 0){
                while($s_row = mysqli_fetch_assoc($s_result)){

                    $name = $s_row['name'];
                    $imagePath = "";

                    // Check if the user have avatar
                    $qavatar = "SELECT * from avatar where user_id = '$user_id' limit 1";
                    $qavatar_result = mysqli_query($conn, $qavatar);

                    if($qavatar_result){
                        $qavatar_row = mysqli_fetch_assoc($qavatar_result);
                        if(!empty($qavatar_row['path']) && !empty($qavatar_row['path'])){
                            $imagePath =  $qavatar_row['path'] . $qavatar_row['name'];
                        }else{
                            $imagePath = "https://ui-avatars.com/api/?name=". $name . "&background=random";
                        }
                    }


?>

<tr class="bg-white border-b ">
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="<?php echo $imagePath;?>" alt="Jese image">
            <div class="ps-3">
                <div class="text-base font-semibold"><?php echo ucwords($s_row['name'])?></div>
                <div class="font-normal text-gray-500"><?php echo $s_row['email'];?></div>
            </div>  
    </th>
    <td class="px-6 py-4">
        <?php echo $s_row['student_number'];?>
    </td>
    <td class="px-6 py-4">
        <?php echo strtoupper($s_row['section']);?>
    </td>
    <td class="px-6 py-4">
        <?php echo strtoupper($s_row['group_no']);?>
    </td>
    <td class="px-6 py-4 font-bold <?php if($status == 'present'){echo "text-green-400";}else if($status == 'late'){echo "text-yellow-400";}else{echo "text-red-400";}?>">
        <?php echo strtoupper($status);?>
    </td>
    <td class="px-6 py-4 text-wrap">
        <?php echo strtoupper($attendatetime);?>
    </td>                                            
</tr>

<?php
                    
                }
            }else{

            }

        }
    } else {
?>

<tr class="w-full">
    <td colSpan="5" class=" w-full text-center bg-white py-4">
        No Data Available.
    </td>
</tr>

<?php
        
    }

?>


