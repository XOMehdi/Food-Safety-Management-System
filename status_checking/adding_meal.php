<?php
if (isset($_POST['checked_status'])) {
    include_once('../connection.php');

    // verify chef_username
    $chef_username = $_POST['chef_username'];

    $meal_name = $_POST['meal_name'];
    $meal_id = substr($meal_name, 0, 4) . substr(time(), -4);
    $date_added = $_POST['date_added'];
    $meal_category = $_POST['meal_category'];
    $selected_ingredients = $_POST['selected_ingredients'];

    $action_type = "";
    $sum_ingredient_cost = 0;
    foreach ($selected_ingredients as $ingredient) {
        // LEFT OUTER JOIN
        $query = $conn->prepare("SELECT * FROM ingredient I LEFT OUTER JOIN allergy A ON ingredient_name = ? AND I.allergy_type = A.allergy_num");
        $query->execute([$ingredient]);
        $row = $query->fetch(PDO::FETCH_OBJ);

        $ingredient_id = $row->ingredient_id;
        $allergy_severity = 0;

        if ($row->allergy_num !== NULL) {
            $allergy_severity = $row->allergy_severity;
        }

        $expire_date = $row->expire_date;
        $expire_date = strtotime($expire_date);
        $current_date = time();

        // check if ingredient is expired or consists of allergies
        if ($expire_date < $current_date) {
            echo "The ingredient: " . $row->ingredient_name . " was Expired on " . $row->expire_date;
            $action_type = "Rejected";
        } else {
            if ($allergy_severity > 5)
                echo "The ingredient: " . $row->ingredient_name . "causes Severe Allergic Effects";

            $sum_ingredient_cost += $row->ingredient_cost;
        }
    }


    // insert after approval for high allergy
    $meal_price = $sum_ingredient_cost;

    if ($action_type != "Rejected") {
        $action_type = "Prepared";

        $query = $conn->prepare("INSERT INTO meal (meal_id, meal_name, meal_price, meal_category) VALUES (?, ?, ?, ?)");
        $query->execute([$meal_id, $meal_name, $meal_price, $meal_category]);

        $query = $conn->prepare("INSERT INTO meal_chef (meal_id, chef_username, action_type) VALUES (?, ?, ?)");
        $query->execute([$meal_id, $chef_username, $action_type]);

        foreach ($selected_ingredients as $ingredient) {

            // get all ingredient_id using names
            $query = $conn->prepare("SELECT * FROM ingredient WHERE ingredient_name = ?");
            $query->execute([$ingredient]);
            $row = $query->fetch(PDO::FETCH_OBJ);
            $ingredient_id = $row->ingredient_id;

            $query = $conn->prepare("INSERT INTO meal_ingredient (meal_id, ingredient_id, date_added) VALUES (?, ?, ?)");
            $query->execute([$meal_id, $ingredient_id, $date_added]);

            echo "Congratulations! Meal is Safe for Serving to Customers.\n";
        }
    }

    header("Location: ../home.php");
} else {
    echo "Error: Form not submitted\n";
}
