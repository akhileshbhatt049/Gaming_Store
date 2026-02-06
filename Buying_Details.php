<?php
// ---------- PHP PART: Handle form submission ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "customer_details";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get POST data
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $payment_method = $_POST['payment_method'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO orders 
        (full_name, phone, province, city, area, product_name, product_image, product_price, payment_method)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdss", $full_name, $phone, $province, $city, $area, $product_name, $product_image, $product_price, $payment_method);

    if ($stmt->execute()) {
        $message = "Order placed successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delivery Details</title>
     <!-- <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 700px; margin: auto; }
        input, select { width: 100%; padding: 8px; margin: 5px 0 15px; font-size: 16px; }
        input[type="submit"] { width: 100%; font-size: 18px; cursor: pointer; }
        .product-card { border: 1px solid #ccc; padding: 10px; margin-top: 20px; text-align: center; }
        .product-card img { width: 200px; height: auto; }
    </style>   -->
    <link rel="stylesheet" href="Assets/CSS/Buying_Details.css">
</head>

<body>

    <?php if (!empty($message)) {
        echo "<h3 style='text-align:center;'>$message</h3>";
    } ?>

    <h2 style="text-align:center;">Delivery Information</h2>

    <form method="POST" action="">
        <!-- Customer Details -->
        <label>Full Name</label>
        <input type="text" name="full_name" placeholder="Enter your full name" required>

        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="Enter your phone number" required>

        <label>Province</label> <br />
        <select name="province" id="province" required onchange="updateCities()">
            <option value="">Choose Province</option>
            <option value="Koshi">Koshi</option>
            <option value="Madhesh">Madhesh</option>
            <option value="Bagmati">Bagmati</option>
            <option value="Gandaki">Gandaki</option>
            <option value="Lumbini">Lumbini</option>
            <option value="Karnali">Karnali</option>
            <option value="Sudurpashchim">Sudurpashchim</option>
        </select> <br />

        <label>City</label>
        <be />
        <select name="city" id="city" disabled required>
            <option value="">--Select City--</option>
        </select>

        <label>Area / Locality</label>
        <select name="area" id="area" disabled required>
            <option value="">--Select Area--</option>
        </select>

        <!-- Product Details -->
        <div class="product-card">
            <img id="productImageDisplay" src="" alt="Product">
            <p><b>Product:</b> <span id="productNameDisplay"></span></p>
            <p><b>Price:</b> $ <span id="productPriceDisplay"></span></p>
        </div>

        <input type="hidden" name="product_name" id="productName">
        <input type="hidden" name="product_price" id="productPrice">
        <input type="hidden" name="product_image" id="productImage">

        <!-- Payment Method -->
        <label>Payment Method</label>
        <select name="payment_method" required>
            <option value="Cash on Delivery">Cash on Delivery</option>
        </select>

        <input type="submit" value="Confirm and Proceed to Payment">
    </form>

    <script src="Assets/JS/Buy_Details.js"></script>

</body>

</html>