<?php
include_once('../connection.php');
$sql = "SELECT ingredient_name FROM ingredient";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FSMS - Meal Status Checking</title>
  <link rel="icon" type="image/x-icon" href="images/logo.png" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <header class="text-center py-4 bg-blue-500">
    <h1 class="text-2xl font-bold my-4">Meal Status Checking</h1>
    <h1 class="text-lg">Enter Meal Details</h1>
  </header>
  <main>
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
              <button class="inline-flex w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="dropdown-button">
                Select Ingredients
                <strong id="hero-icon" class="ml-4">˅</strong>
              </button>

              <div class="mb-4 origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                <div id="ingredients-container" class="py-1 hidden max-h-20 overflow-y-auto" role="none">
                  <?php
                  while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    echo '<button
                      class="fetched-ingredients block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                      role="menuitem"
                      tabindex="-1"
                    >
                      ' . $row->ingredient_name . '</button
                    >';
                  } ?>
                </div>
              </div>

              <form action="adding_meal.php" method="GET">
                <div class="mb-4 mt-10">
                  <ul id="selected-ingredients" class="mb-4">

                  </ul>
                  <input type="hidden" name="checked_status" value=1>
                  <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline" type="submit" value="Check Status">
                </div>
              </form>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <footer></footer>
  <script src="status_checking.js" defer></script>
</body>

</html>