<?php
include_once('connection.php');
include('secure.php');

$sql = "SELECT * FROM ingredient";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FSMS - Home</title>
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

<body class="flex flex-row">
  <div class="w-1/4 h-screen bg-gray-900 text-white flex flex-col justify-center">
    <ul class="ml-3 mt-10">
      <li class="mb-4"><a href="home.php" class="hover:text-blue-200 font-medium">Home</a></li>
      <li class="mb-4"><a href="personal_info.php" class="hover:text-blue-200 font-medium">Personal Info</a></li>
      <li class="mb-4"><a href="status_checking/status_checking.php" class="hover:text-blue-200 font-medium">Meal Status Checking</a></li>
      <li class="mb-4"><a href="adding_ingredient/adding_ingredient.html" class="hover:text-blue-200 font-medium">Ingredient Addition</a></li>
      <li class="mt-10"><a class="block bg-white text-blue-500 py-2 px-2 rounded-full mr-6 text-center" href='logout.php'>Sign Out</a></li>
    </ul>
  </div>
  <div class="w-3/4 h-screen bg-white flex flex-col justify-center items-center overflow-y-auto">
    <h1 class="text-4xl font-bold mb-6">Available Ingredients</h1>
    <table class="table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Cost</th>
          <th class="px-4 py-2">Purchased On</th>
          <th class="px-4 py-2">Best Before</th>
          <th class="px-4 py-2">Allergy Type</th>
          <th class="px-4 py-2">Purcashed From</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
          echo "<tr>
          <td class='border px-4 py-2'>$row->ingredient_id</td>
          <td class='border px-4 py-2'>$row->ingredient_name</td>
          <td class='border px-4 py-2'>$row->ingredient_cost</td>
          <td class='border px-4 py-2'>$row->purchase_date</td>
          <td class='border px-4 py-2'>$row->expire_date</td>
          <td class='border px-4 py-2'>$row->allergy_type</td>
          <td class='border px-4 py-2'>$row->supplier</td>
          <td class='border px-4 py-2'>
            <a href='updating_ingredient.html' class='btn'>Update</a>
          </td>
          <td class='border px-4 py-2'>
              <form class='inline-block' action='delete.php' method='POST'>
                  <input type='hidden' name='ingredient_id' value='$row->ingredient_id'>
                  <button type='submit' name='delete' class='btn'>Delete</button>
              </form>
          </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
</body>

</html>


<!-- <td class='border px-4 py-2'>
                     <a href='edit.php?id=$row->ingredient_id'>
                       <svg class='w-6 h-6' xmlns='http:www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                         <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'/>
                         <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6l3 3m0 0l3-3m-3 3v6'/>
                       </svg>
                     </a>
                     <a href='delete.php?id=$row->ingredient_id'>
                       <svg class='w-6 h-6 ml-4' xmlns='http:www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                         <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/>
                       </svg>
                     </a>
                   </td> -->