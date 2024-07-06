
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

<?php 

  session_start();

  include "sidebar.php";
?>

<nav class="absolute pt-3 w-full border-gray-200  px-[130px]">
  <div class=" px-[50px]  bg-white rounded-lg flex items-center justify-between mx-auto shadow-md shadow-green-200">
    <div class=" w-auto flex justify-center items-center" id="navbar-multi-level">
      <p id="pathName" class="font-extrabold tracking-wide text-gray-900 text-[18px]"></p>
    </div>

    <div class="flex items-center flex-between font-poppins">
      
        <div class="flex w-full mr-5 gap-5">
            <!-- dropdown section -->
            <select name="section" id="section" class="cursor-pointer px-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 hover:bg-gray-50 w-[180px] py-2">
                <option >Year&Section</option>
                <option value="1a" <?php echo $_SESSION['section'] == "1a" ? 'selected' : '';?> >1A</option>
                <option value="2a" <?php echo $_SESSION['section'] == "2a" ? 'selected' : '';?> >2A</option>
                <option value="2b" <?php echo $_SESSION['section'] == "2b" ? 'selected' : '';?> >2B</option>
                <option value="3a" <?php echo $_SESSION['section'] == "3a" ? 'selected' : '';?> >3A</option>
                <option value="4a" <?php echo $_SESSION['section'] == "4a" ? 'selected' : '';?> >4A</option>
            </select>
             <!-- dropdown group -->
            <select name="groupnumber" id="groupnumber" class="cursor-pointer px-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 hover:bg-gray-50 w-[130px] py-2">
                <option>Group</option>
                <option value="g1" <?php echo $_SESSION['groupnumber'] == "g1" ? 'selected' : '';?> >G1</option>
                <option value="g2" <?php echo $_SESSION['groupnumber'] == "g2" ? 'selected' : '';?> >G2</option>
            </select>

        </div>
      
      <div class="border border-gray-300 content-none h-[30px] mr-[20px]"></div>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

        <button type="button" class=" py-2 flex justify-between align-center items-center text-sm rounded-full w-full" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <img class="w-12 h-12 rounded-full" src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" alt="user photo">
          <div class="px-3 text-nowrap">
            <p class="font-bold tracking-wide text-[16px] text-gray-900 text-start w-full"><?php echo $_SESSION['name'];?></p>
            <p class="text-gray-500 tracking-wide text-start font-medium "><?php echo $_SESSION['role'];?></p>
          </div>
        </button>

        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded-lg shadow-md bg-emerald-950" id="user-dropdown">
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-10 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-800">Profile</a>
            </li>
            <li>
              <a href="#" class="block px-10 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-800">Change Password</a>
            </li>
            <li>
              <a href="logout.php" class="block px-10 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-800">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- For route name and display -->
<script>

const route = window.location.pathname;
var routeName = route.replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '');

function upperInitial(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

if(routeName === "addstudent"){
  routeName = 'Add Student';
} 
else if(routeName === "attendanceoverview"){
  routeName = 'Attendance Overview';
} 
else if(routeName === "inventoryadmin"){
  routeName = 'Inventory Management';
} 

  let titleName = upperInitial(routeName);
  var titlePage = document.getElementById('pathName');


  titlePage.innerText = titleName;

</script>


<!-- If the dropdown is change create a session for it -->
<script>

function updateSession(selectedElementId, newValue) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'session.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(selectedElementId + '=' + encodeURIComponent(newValue));

    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log('Session variable set successfully for ' + selectedElementId);
            console.log(xhr.responseText);
        } else {
            console.error('Error setting session variable.');
        }
    };
}

function reloadTable() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'attendanceLogs.php', true);

    xhr.readyState = function() {
      console.log(xhr.statusText);
        if (xhr.status == 200) {
            console.log('Table reloaded succesfully');
        } else {
            console.error('Error setting session variable.');
        }
    };
}

document.addEventListener('DOMContentLoaded', function() {
    // Select the first select element
    var selectedSection = document.getElementById('section');

    // Add change event listener
    selectedSection.addEventListener('change', function() {
        var selectedOption = selectedSection.value;
        updateSession('section', selectedOption);
        reloadTable();
    });

    // Select the second select element
    var selectedGroup = document.getElementById('groupnumber');

    // Add change event listener
    selectedGroup.addEventListener('change', function() {
        var selectedOption = selectedGroup.value;
        updateSession('groupnumber', selectedOption);
        reloadTable();
    });
});
</script>


