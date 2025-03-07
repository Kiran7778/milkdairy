<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $milk_type = $_POST['milk_type'];
    $quantity = $_POST['quantity'];

    // Set rates (You can fetch this from DB later)
    $rates = ["Full Cream Milk" => 120, "Toned Milk" => 100, "Skimmed Milk" => 80];

    $rate = $rates[$milk_type];
    $total = $rate * $quantity;

    $sql = "INSERT INTO orders (customer_name, milk_type, quantity, rate, total) 
            VALUES ('$customer_name', '$milk_type', '$quantity', '$rate', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
