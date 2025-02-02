    <?php
        session_start();

        if(!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == "true")
        {
            header("Location: login.php");
            exit;
        }

        $checkRoute = str_replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '', $_SERVER["REQUEST_URI"]);
        if($checkRoute === '' || $checkRoute === '/' ){
            header("Location: home");
        }

        include "totals.php";

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR Attendance Management with Inventory System</title>
        <link rel="icon" href="assets/img/bulsuhag.png" type="image/x-icon">
        <link rel="shortcut icon" href="assets/img/bulsuhag.png" type="image/x-icon">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="assets/style.css">
        <script src="assets/script.js"></script>

        <script>
        function reloadTable() {
            var table = document.getElementById('attendancetoday');
            // alert('Table reloaded!');
        }

        function checkSessionChange() {
            var currentSessionValueofGroup = "<?php echo isset($_SESSION['groupnumber']) ? $_SESSION['groupnumber'] : '' ?>";
            var currentSessionValueofSection = "<?php echo isset($_SESSION['section']) ? $_SESSION['section'] : '' ?>";

            
            setInterval(function() {
                var xhr = new XMLHttpRequest();
                
                xhr.open('GET', 'session.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        var serverSessionValueforGroup = xhr.responseText.substring(2, 4);
                        var serverSessionValueforSection = xhr.responseText.substring(0, 2);

                        if (currentSessionValueofGroup !== serverSessionValueforGroup || currentSessionValueofSection !== serverSessionValueforSection) {
                            reloadTable();
                            currentSessionValueofGroup = serverSessionValueforGroup;
                            currentSessionValueofSection = serverSessionValueforSection;
                        }
                    } else {
                        console.error('Error checking session.');
                    }
                };
                
                xhr.send();
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            checkSessionChange();
        });

        </script>
    </head>
    <body>

        <?php include "components/topbar.php"; ?>

        <div class="flex justify-around h-screen w-screen font-poppins pt-[120px] bg-green-50">
            <div class="flex justify-center h-full w-full bg-opacity-75 px-[200px]">
                
                        <!-- scanned student -->
                        <div class=" flex flex-col items-center ">
                            <p class="rounded-lg w-full text-gray-700 py-3 px-4 bg-white shadow-md shadow-green-200 text-nowrap">
                                <span class="font-medium text-green-500">Success!</span>
                                Student QR Code Scan completed!
                            </p>
                            <div class="my-5 p-5 bg-teal-900 rounded-lg  flex flex-col justify-between align-center items-center shadow-md shadow-green-200 w-80">
                                <img class="border-8 border-gray-50 rounded-full" src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" width="200px" alt="dummy">
                                <div class="mt-10 rounded text-center w-full h-full flex flex-col justify-between">
                                    <div>
                                        <p class="text-[20px] text-gray-50 font-bold uppercase">Juan Dela Cruz</p>
                                        <p class="text-gray-100  uppercase">BSIT 4A - G1</p>
                                        <p class="text-gray-50 font-medium uppercase">2019-600123</p>
                                    </div>
                                    <div class="mt-5 content-none border border-gray-100"></div>
                                    <p class="text-gray-100 tracking-wider">May 4, 2000</p>

                                </div>
                            </div>
                            <p class="rounded-lg w-full text-gray-700 py-3 px-4 bg-white shadow-md shadow-green-200 text-nowrap">
                                <span class="font-medium text-yellow-500">Attention!</span>
                                Scanned QR Code information will show here.
                            </p>
                        </div>

                        <!-- line between -->
                        <div class="border-2 border-teal-500 border-opacity-50 content-none h-[600px] mx-10"></div>

                        <!-- read -->
                        <div class="`flex flex-col gap-9 h-full w-full">
                            
                            <div class="grid grid-cols-3 w-full gap-9 mb-7">
                                
                                <div class="p-6  bg-white rounded-lg flex justify-between shadow-md shadow-green-200">
                                    <div class="flex flex-col justify-between align-center">
                                        <p class="font-bold text-[35px] tracking-wide font-outfit text-gray-950 mb-5"><?php echo $total_student;?></p>
                                        <p class="font-bold text-[16px] tracking-wide text-gray-950">Total Students</p>
                                    </div>
                                    <svg class="ml-8 mt-2 text-green-600" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 16 16"><path fill="currentColor" d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4"/></svg>
                                </div>
                                <div class="p-6  bg-white rounded-lg flex justify-between shadow-md shadow-green-200">
                                    <div class="flex flex-col justify-between align-center">
                                        <p class="font-bold text-[35px] tracking-wide font-outfit text-gray-950 mb-5"><?php echo $present;?></p>
                                        <p class="font-bold text-[16px] tracking-wide text-gray-950">Present</p>
                                    </div>
                                    <svg class="ml-8 mt-2 text-green-600" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 21V5H3v8H1V5q0-.825.588-1.412T3 3h18q.825 0 1.413.588T23 5v14q0 .825-.587 1.413T21 21M9 14q-1.65 0-2.825-1.175T5 10t1.175-2.825T9 6t2.825 1.175T13 10t-1.175 2.825T9 14m0-2q.825 0 1.413-.587T11 10t-.587-1.412T9 8t-1.412.588T7 10t.588 1.413T9 12M1 22v-2.8q0-.85.438-1.562T2.6 16.55q1.55-.775 3.15-1.162T9 15t3.25.388t3.15 1.162q.725.375 1.163 1.088T17 19.2V22zm2-2h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T9 17t-2.775.338T3.5 18.35q-.225.125-.363.35T3 19.2zm6 0"/></svg>
                                </div>
                                <div class="p-6  bg-white rounded-lg flex justify-between shadow-md shadow-green-200">
                                    <div class="flex flex-col justify-between align-center">
                                        <p class="font-bold text-[35px] tracking-wide font-outfit text-gray-950 mb-5"><?php echo $absent;?></p>
                                        <p class="font-bold text-[16px] tracking-wide text-gray-950">Absent</p>
                                    </div>
                                    <svg class="ml-8 mt-2 text-green-600" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M23 15.5c0-.71-.16-1.36-.45-1.96a7 7 0 0 0-3.69-3.92a6.55 6.55 0 0 0-1.9-3.58C15.6 4.68 13.95 4 12 4c-1.58 0-3 .47-4.25 1.43s-2.08 2.19-2.5 3.72c-1.25.28-2.29.93-3.08 1.95S1 13.28 1 14.58c0 1.51.54 2.8 1.61 3.85C3.69 19.5 5 20 6.5 20h3.76c1.27 1.81 3.36 3 5.74 3c3.87 0 7-3.13 7-7zM6.5 18c-.97 0-1.79-.34-2.47-1C3.34 16.29 3 15.47 3 14.5s.34-1.79 1.03-2.47C4.71 11.34 5.53 11 6.5 11H7c0-1.38.5-2.56 1.46-3.54C9.44 6.5 10.62 6 12 6s2.56.5 3.54 1.46c.46.47.81 1 1.05 1.57C16.4 9 16.2 9 16 9c-3.87 0-7 3.13-7 7c0 .7.11 1.37.29 2zm9.5 3c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m.5-4.75l2.86 1.69l-.75 1.22L15 17v-5h1.5z"/></svg>
                                </div>
                            </div>

                            <div class="relative overflow-x-auto shadow-md shadow-green-200 rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500" id="attendancetoday">
                                    <caption class="relative p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                        Attendance Today
                                        <a class="absolute right-3 text-[12px] font-medium text-green-800 hover:drop-shadow-md hover:drop-shadow-teal-900" href="attendanceoverview">View All  ></a>
                                    </caption>
                                    
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Student Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                ID Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Section
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Group
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php include "./attendanceLogs.php";?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    
            </div>
        </div>


    </body>
    </html>