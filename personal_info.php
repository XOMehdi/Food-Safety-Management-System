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
    <div class="w-3/4 h-screen bg-white flex flex-col justify-center items-center overflow-y-auto">
        <h1 class="text-4xl font-bold mb-6">Personal Informaion</h1>
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Password</th>
                    <th class="px-4 py-2">First Name</th>
                    <th class="px-4 py-2">Last Name</th>
                    <th class="px-4 py-2">Age</th>
                    <th class="px-4 py-2">Gender</th>
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>
            <td class='border px-4 py-2' >$row->chef_id</td>
            <td class='border px-4 py-2' >$row->password</td>
            <td class='border px-4 py-2' >$row->chef_fname</td>
            <td class='border px-4 py-2' >$row->chef_lname</td>
            <td class='border px-4 py-2' >$row->chef_age</td>
            <td class='border px-4 py-2' >$row->chef_gender</td>
            <td class='border px-4 py-2'>
            <a href='updating_chef.html' class='btn'>Update</a>
          </td>
          <td class='border px-4 py-2'>
              <form class='inline-block' action='delete_chef.php' method='POST'>
                  <input type='hidden' name='chef_id' value='$row->chef_id'>
                  <button type='submit' name='delete' class='btn'>Delete</button>
              </form>
          </td>
          </tr>";
                }
                ?>
</body>

</html>