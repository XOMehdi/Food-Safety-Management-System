<?php
include_once('connection.php');
include('secure.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FSMS - Updating Ingredient</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <header class="text-center py-4">
      <h1 class="text-2xl font-bold">Updating Ingredient</h1>
    </header>

    <main>
      <div class="container mx-auto mt-4">
        <form action="update.php" method="POST">
          <div class="rounded-lg shadow-lg bg-white p-6">
            <div class="flex items-center justify-center">
              <div class="w-1/4">
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Name
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="ingredient-name"
                    type="text"
                    placeholder="Enter the Ingredient's Updated Name"
                    name="ingredient_name"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Cost
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="ingredient-cost"
                    placeholder="Enter Updated Cost of the Ingredient"
                    name="ingredient_cost"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Update Purchase Date
                  </label>
                  <input
                    type="date"
                    id="purchase-date"
                    class="border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="purchase_date"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Update Expire Date
                  </label>
                  <input
                    type="date"
                    id="expire-date"
                    class="border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="expire_date"
                  />
                </div>
                <div class="mb-4">
                  <input
                    type="hidden"
                    name="update_ingredient"
                    value="<?php echo $_GET['id']; ?>"
                  />
                  <input type="submit" class="btn" value="Update" />
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
