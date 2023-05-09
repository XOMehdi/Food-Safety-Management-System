<?php
include_once('../connection.php');
include('../secure.php');

$sql = "SELECT ingredient_name FROM ingredient";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FSMS - Meal Status Checking</title>
  <link rel="icon" type="image/x-icon" href="../images/logo.png" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <header class="text-center py-4 bg-black text-white">
    <h1 class="text-2xl font-bold my-4">Meal Status Checking</h1>
    <h1 class="text-lg">Enter Meal Details</h1>
  </header>
  <main>
    <div class="flex">
      <div class="w-1/4 h-screen bg-gray-900 text-white flex flex-col justify-center">
        <ul class="ml-3 mt-10">
          <li class="mb-4"><a href="../home.php" class="hover:text-blue-200 font-medium">Home</a></li>
          <li class="mb-4"><a href="../personal_info.php" class="hover:text-blue-200 font-medium">Personal Info</a></li>
          <li class="mb-4"><a href="../adding_ingredient/adding_ingredient.html" class="hover:text-blue-200 font-medium">Ingredient Addition</a></li>
          <li class="mb-4"><a href="status_checking.php" class="hover:text-blue-200 font-medium">Meal Status Checking</a></li>
          <li class="mt-10"><a class="block bg-white text-blue-500 py-2 px-2 rounded-full mr-6 text-center" href='../logout.php'>Log Out</a></li>
        </ul>
      </div>
      <div class="container mx-auto">
        <div class="rounded-lg shadow-lg bg-white p-6">
          <div class="flex items-center justify-center">
            <form class="w-1/4" action="adding_meal.php" method="POST">
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">
                  Chef ID
                </label>
                <input class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" type="text" placeholder="Enter Your Chef ID" name="chef_id" />
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">
                  Meal Name
                </label>
                <input class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" type="text" placeholder="Enter Meal Name" name="meal_name" />
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">
                  Select Date & Time
                </label>
                <input type="datetime-local" id="date-input" class="border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="date_added" />
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">
                  Category
                </label>
                <input class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" type="text" placeholder="Vegetarian/Non-Vegetarian/Chinese/Italian etc" name="meal_category" />
              </div>
              <div class="mb-4 relative inline-block text-left">
                <button class="inline-flex w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 " id="dropdown-button">
                  Select Ingredients
                  <strong id="hero-icon" class="ml-6">˅</strong>
                </button>
                <div id="ingredients-container" class="py-1 hidden max-h-20 overflow-y-auto" role="none">

                  <?php
                  while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<input
                         type="checkbox"
                          value="' . $row->ingredient_name . '"
                          name="selected_ingredients[]"
                        >
                        <span class="fetched-ingredients">' . $row->ingredient_name . '</span>';
                  } ?>
                </div>
                <input type="hidden" name="checked_status" value=1>
                <input class="my-6 bg-black text-white hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline" type="submit" value="Check Status">
              </div>
              <div class="mb-4 mt-10">
                <ul id="selected-ingredients" class="mb-4">
                </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer></footer>
  <script src="status_checking.js" defer></script>
</body>

</html>