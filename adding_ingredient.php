<?php
if (isset($_GET['ingredient_submitted'])) {
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=fsms", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "\n";
    }

    $ingredient_id = $_GET['ingredient_name'];
    $ingredient_id = substr($ingredient_id, 0, 4) . substr(time(), -4);

    $ingredient_name = $_GET['ingredient_name'];
    $ingredient_cost = $_GET['ingredient_cost'];
    $purchase_date = $_GET['purchase_date'];
    $expiry_date = $_GET['expire_date'];

    $supp_name = $_GET['supp_name'];
    $supp_phone = $_GET['supp_phone'];
    $supp_country = $_GET['supp_country'];

    $allergy_type = $_GET['allergy_type'];
    $allergy_severity = $_GET['severity_level'];



    $conn->query("INSERT INTO allergy (allergy_type, allergy_severity) VALUES ('$allergy_type', '$allergy_severity')");
    $conn->query("INSERT INTO supplier (supp_name, supp_phone, supp_country) VALUES ('$supp_name', '$supp_phone', '$supp_country')");

    $query = $conn->query("SELECT allergy_num FROM allergy");
    $row = $query->fetch(PDO::FETCH_OBJ);
    $allergy_num = $row->allergy_num;

    $query = $conn->query("SELECT supp_num FROM supplier");
    $row = $query->fetch(PDO::FETCH_OBJ);
    $supp_num = $row->supp_num;

    $conn->query("INSERT INTO THEMEPARK (ingredient_id, ingredient_name, ingredient_cost, purchase_date, expire_date, allergy_type, supplier) VALUES ('$ingredient_id', '$ingredient_name', '$ingredient_cost', '$purchase_date', '$expire_date', '$allergy_num', '$supp_num')");

    echo "Your form has been submitted\n";
} else {
    echo "Error: Form not submitted\n";
}
