<?php
        session_start();

        // if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true")
        // {
        //     header("Location: login.php");
        //     exit;
        // }

        $checkRoute = str_replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '', $_SERVER["REQUEST_URI"]);
        if($checkRoute === '' || $checkRoute === '/' ){
            header("Location: home");
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

    </head>
    <body>

        <?php include "components/topbar.php"; ?>

        <div class="flex justify-center font-poppins h-screen w-full pt-[120px] bg-green-50">
            <div class="bg-opacity-75">
                
                <form action="" method="POST" class="flex flex-col gap-5" >
                    <!-- The whole card -->
                    <div class=" w-full ">

                        <div class="w-full relative gap-5 flex bg-white p-7 rounded-lg shadow-md shadow-green-200">
                            <div id="dropArea">
                                <label for="name" class="tracking-wide block text-[11px] text-gray-900 uppercase font-bold">Student Picture</label>
                                <div id="avatar" class="flex items-center justify-center">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center  w-[200px] h-[200px] h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>  
                                            <p class="mb-2 text-[10px] text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-[10px] text-gray-500">SVG, PNG, JPG or GIF</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div> 
                            </div>

                            <div id="allinputs">
                                <label for="name" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Student Name</label>
                                <div id="name" class="flex gap-5">
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="fname" id="fname" placeholder="First Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="middlename">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="mname" id="mname" placeholder="Middle Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="lname" id="lname" placeholder="Last Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="suffix">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="suffix" id="suffix" placeholder="Suffix">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                </div>

                                
                                <div id="name" class="flex gap-5">

                                    <div class="w-full">
                                        <label for="idnumber" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">ID Number</label>
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none placeholder:tracking-wide" 
                                        name="idnumber" id="idnumber" placeholder="Id Number">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="email" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Email</label>
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none placeholder:tracking-wide" 
                                        name="email" id="email" placeholder="Id Number">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>


                                </div>

                                <div id="name" class="grid grid-flow-col grid-cols-4 gap-5">

                                    <div class="w-full">
                                        <label for="section" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Year and Section</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="section">
                                            <option selected>Year&Section</option>
                                            <option value="1a">1A</option>
                                            <option value="2a">2A</option>
                                            <option value="2b">2B</option>
                                            <option value="3a">3A</option>
                                            <option value="4a">4A</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="group" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Group Number</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="group">
                                            <option selected>Group</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                </div>
                            </div>

                            

                            <div class="absolute right-5 bottom-5 flex items-center gap-2">
                                <button type="button" 
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1M6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z"/></svg>
                                </button>
                                <button type="button" type="submit" 
                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none ">
                                Add Another</button>
                                <button type="button" type="submit" 
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none ">
                                Add</button>
                            </div>
                        </div>
                    </div>
                    <!-- End of The whole card -->

                    

                    <div class="relative overflow-x-auto shadow-md shadow-green-200 rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                                        Attendance Today
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b ">
                                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-10 h-10 rounded-full" src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" alt="Jese image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">Neil Sims</div>
                                                    <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                                                </div>  
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-green-600">Present</p>
                                            </td>
                                            
                                        </tr>
                                        <tr class="bg-white border-b  ">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                Microsoft Surface Pro
                                            </th>
                                            <td class="px-6 py-4">
                                                White
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop PC
                                            </td>
                                            <td class="px-6 py-4">
                                                $1999
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-red-600">Absent</p>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b ">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-green-600">Present</p>
                                            </td>
                                            
                                        </tr>
                                        <tr class="bg-white border-b ">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-green-600">Present</p>
                                            </td>
                                            
                                        </tr>
                                        <tr class="bg-white border-b ">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-green-600">Present</p>
                                            </td>
                                            
                                        </tr>
                                        <tr class="bg-white border-b ">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                            <td class="px-6 py-4">
                                                Laptop
                                            </td>
                                            <td class="px-6 py-4">
                                                $2999
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-green-600">Present</p>
                                            </td>
                                            
                                        </tr>
                                        <tr class="bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                Magic Mouse 2
                                            </th>
                                            <td class="px-6 py-4">
                                                Black
                                            </td>
                                            <td class="px-6 py-4">
                                                Accessories
                                            </td>
                                            <td class="px-6 py-4">
                                                $99
                                            </td>
                                            <td class="px-6 py-4 font-bold font-roboto">
                                                <p class="text-yellow-600">Late</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    

                </form>

            </div>
        </div>

    </body>
    </html>