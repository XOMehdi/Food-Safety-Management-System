<?php
if (isset($_POST['checked_status'])) {
    include_once('../connection.php');

    // verify chef_id
    $chef_id = $_POST['chef_id'];

    $meal_name = $_POST['meal_name'];
    $meal_id = substr($meal_name, 0, 4) . substr(time(), -4);
    $date_added = $_POST['date_added'];
    $meal_category = $_POST['meal_category'];
    $selected_ingredients = $_GET['ingredient'];

    $query = $conn->prepare("INSERT INTO allergy (allergy_type, allergy_severity) VALUES (?, ?)");
    $query->execute([$allergy_type, $allergy_severity]);

    $sum_ingredient_cost = 0;
    foreach ($selected_ingredients as $ingredient) {

        $query = $conn->query("SELECT * FROM ingredient WHERE ingredient_name = '$ingredient'");
        $row = $query->fetch(PDO::FETCH_OBJ);
        $ingredient_id = $row->ingredient_id;
        $sum_ingredient_cost += $row->ingredient_cost;

        $query = $conn->query("INSERT INTO meal_ingredient (meal_id, ingredient_id, date_added) VALUES ('$meal_id', '$ingredient_id', '$date_added')");
    }

    $meal_price = $sum_ingredient_cost;
    $action_type = "Creation";


    $query = $conn->prepare("INSERT INTO meal (meal_id, meal_name, meal_price, meal_category) VALUES (?, ?, ?, ?)");
    $query->execute([$meal_id, $meal_name, $meal_price, $meal_category]);

    $query = $conn->prepare("INSERT INTO meal_chef (meal_id, chef_id, action_type) VALUES (?, ?, ?)");
    $query->execute([$meal_id, $chef_id, $action_type]);

    echo "Your form has been submitted\n";
} else {
    echo "Error: Form not submitted\n";
}
