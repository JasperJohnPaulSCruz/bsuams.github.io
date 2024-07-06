<?php


include "connect.php";

    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];

    $query = "SELECT * from student where section = '$section' and group_no = '$group_no'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $name = $row['name'];
            $imagePath = "";

            $qavatar = "SELECT * from avatar where user_id = '$user_id' limit 1";
            $qavatar_result = mysqli_query($conn, $qavatar);

            if($qavatar_result){
                $qavatar_row = mysqli_fetch_assoc($qavatar_result);
                if(!empty($qavatar_row['path']) && !empty($qavatar_row['path'])){
                    $imagePath =  $qavatar_row['path'] . $qavatar_row['name'];
                }else{
                    $imagePath = "https://ui-avatars.com/api/?name=". $name . "&background=random";
                }
            }else{
            }

?>

<tr class="bg-white border-b ">
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="<?php echo $imagePath;?>" alt="Jese image">
            <div class="ps-3">
                <div class="text-base font-semibold"><?php echo ucwords($row['name'])?></div>
                <div class="font-normal text-gray-500"><?php echo $row['email'];?></div>
            </div>  
    </th>
    <td class="px-6 py-4">
        <?php echo $row['student_number'];?>
    </td>
    <td class="px-6 py-4">
        <?php echo strtoupper($row['section']);?>
    </td>
    <td class="px-6 py-4">
        <?php echo strtoupper($row['group_no']);?>
    </td>
    <td class="text-center">
        <button type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Edit
        </button>
        <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Delete
        </button>
    </td>
                                            
</tr>


<?php
        }
    } else {
        // echo "Error executing query: " . mysqli_error($conn);

?>

<tr class="w-full">
    <td colSpan="5" class=" w-full text-center bg-white py-4">
        No Student Available.
    </td>
</tr>


<?php
        
    }

?>


