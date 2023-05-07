<?php
if (isset($_POST['checked_status'])) {
    include_once('../connection.php');

    // verify chef_id
    $chef_id = $_POST['chef_id'];

    $meal_name = $_POST['meal_name'];
    $meal_id = substr($meal_name, 0, 4) . substr(time(), -4);
    $date_added = $_POST['date_added'];
    $meal_category = $_POST['meal_category'];
    // meal_price through sum ingredient cost
    // ingredient info in cluster??

    $meal_price = 15.63;
    $action_type = "Creation";


    $query = $conn->prepare("INSERT INTO meal (meal_id, meal_name, meal_price, meal_category) VALUES (?, ?, ?, ?)");
    $query->execute([$meal_id, $meal_name, $meal_price, $meal_category]);

    $query = $conn->prepare("INSERT INTO meal_chef (meal_id, chef_id, action_type) VALUES (?, ?, ?)");
    $query->execute([$meal_id, $chef_id, $action_type]);

    $query = $conn->prepare("INSERT INTO meal_ingredient (meal_id, ingredient_id, date_added) VALUES (?, ?, ?)");
    $query->execute([$meal_id, $ingredient_id, $date_added]);


    echo "Your form has been submitted\n";
} else {
    echo "Error: Form not submitted\n";
}
