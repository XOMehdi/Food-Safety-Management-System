<?php
include_once('connection.php');
include('secure.php');

$sql = "SELECT * FROM chef";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FSMS - Personal Info</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn:hover {
            background-color: #ffff00;
            color: #000;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="flex">
        <div class="w-1/4 h-screen bg-gray-900 text-white flex flex-col justify-center">
            <ul class="ml-3 mt-10">
                <li class="mb-4"><a href="home.php" class="hover:text-blue-200 font-medium">Home</a></li>
                <li class="mb-4"><a href="personal_info.php" class="hover:text-blue-200 font-medium">Personal Info</a></li>
                <li class="mb-4"><a href="adding_ingredient/adding_ingredient.html" class="hover:text-blue-200 font-medium">Ingredient Addition</a></li>
                <li class="mb-4"><a href="status_checking/status_checking.php" class="hover:text-blue-200 font-medium">Meal Status Checking</a></li>
                <li class="mt-10"><a class="block bg-white text-blue-500 py-2 px-2 rounded-full mr-6 text-center" href='logout.php'>Log Out</a></li>
            </ul>
        </div>
        <div class="w-3/4 h-screen bg-white flex flex-col justify-center items-center overflow-y-auto">
            <h1 class="text-2xl font-bold mb-6">Account Details</h1>
            <table class="table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Password</th>
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Age</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                        $bgColor = $i % 2 == 0 ? 'bg-gray-100' : 'bg-gray-200';
                        echo "<tr class='$bgColor'>
                        <td class='border px-4 py-2' >$row->chef_id</td>
                        <td class='border px-4 py-2' >$row->password</td>
                        <td class='border px-4 py-2' >$row->chef_fname</td>
                        <td class='border px-4 py-2' >$row->chef_lname</td>
                        <td class='border px-4 py-2' >$row->chef_age</td>
                        <td class='border px-4 py-2' >$row->chef_gender</td>
                        <td class='border px-4 py-2'>
                        <a href='updating_chef.html' class='btn'>Update | </a>
                        <form class='inline-block' action='delete_chef.php' method='POST'>
                            <input type='hidden' name='chef_id' value='$row->chef_id'>
                            <button type='submit' name='delete' class='btn'>Delete</button>
                        </form>
                    </td>
                    </tr>";
                        $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>