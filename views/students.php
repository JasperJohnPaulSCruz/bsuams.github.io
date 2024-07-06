    <?php
        session_start();

        if(!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == "true")
        {
            header("Location: login.php");
            exit;
        }

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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    </head>
    <body>

        <?php include "components/topbar.php"; ?>


        <div class="flex h-screen justify-around font-poppins pt-[100px] bg-green-50">
            <div class="flex justify-center h-full w-full bg-opacity-75">

                <div class="mr-[30px] w-full px-[200px]">   

                    <div class=" w-full mb-5 flex gap-5">
                        <div class="relative w-full h-full flex justify-start items-center">
                            <input type="search" id="search-dropdown" class="block pl-9 p-2.5 w-full  text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." required />
                                <svg class="w-5 h-5 absolute opacity-40 left-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                        </div>

                        <select id="section" class="px-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-[170px] py-2">
                            <option value="all" selected>All</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                        </select>

                        <div class="relative max-w-sm w-[170px] ">
                            <input type="date" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        </div>

                        <a 
                        type="button"
                        href="addstudent" 
                        class="w-40 text-nowrap shadow-md text-white text-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5   focus:outline-none ">
                        Add Student
                        </a>
                    </div>

                    

                    <div class="relative overflow-x-auto shadow-md shadow-green-200 rounded-lg">

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                                Student of  <span><?php echo strtoupper($_SESSION['section'])." ".strtoupper($_SESSION['groupnumber']);?></span>
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
                                    <th scope="col" class="text-center px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php include "./studentTable.php"; ?>
                                </tbody>
                        </table>
                    </div>
                </div>     

            </div>
        </div>

    </body>
    </html>