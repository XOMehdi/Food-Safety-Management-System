<?php
include_once('connection.php');
include('secure.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FSMS - Updating Chef</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <header class="text-center py-4">
      <h1 class="text-2xl font-bold">Updating Chef</h1>
    </header>

    <main>
      <div class="container mx-auto mt-4">
        <form action="update.php" method="POST">
          <div class="rounded-lg shadow-lg bg-white p-6">
            <div class="flex items-center justify-center">
              <div class="w-1/4">
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    First Name
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="chef-fname"
                    type="text"
                    placeholder="Enter Your Updated First Name"
                    name="chef_fname"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Last Name
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="chef-lname"
                    type="text"
                    placeholder="Enter Your Updated Last Name"
                    name="chef_lname"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Age
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="chef-age"
                    type="text"
                    placeholder="Enter Your Updated Age"
                    name="chef_age"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Gender
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="chef-gender"
                    type="text"
                    placeholder="Enter Your Updated Gender"
                    name="chef_gender"
                  />
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2">
                    Password
                  </label>
                  <input
                    class="appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                    id="password"
                    type="password"
                    placeholder="Enter Your Updated Password"
                    name="chef_password"
                  />
                </div>
                <div class="mb-4">
                  <input
                    type="submit"
                    name="update_chef"
                    class="btn"
                    value="Update"
                  />
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
