<?php
$conn = mysqli_connect("localhost", "root", "", "ProductDB") or die("Database connection failed");

if (!isset($_GET['id'])) {
    die("Product not found");
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM PRODUCTS WHERE ID = $id");

if (mysqli_num_rows($result) == 0) {
    die("Product not found");
}

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['Product_name']; ?></title>

     <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="Assets/CSS/Buy_Keyboard.css">
</head>

<body>

<a href="javascript:history.back()">
    <button class="btn-back">&#8592; back</button>
</a>

<div id="Buy_keyboard">

    <div class="Buy_option">
        <img src="<?php echo './' . $product['Product_image']; ?>"
             alt="Product Image"
             class="Keyboard_image" />

        <div class="items_details">

            <span class="Keyboard_name">
                <?php echo $product['Product_name']; ?>
            </span>

            <p class="Price">
                Price: $<?php echo $product['Price']; ?>
            </p>

            <p class="Quantity">
                Quantity:
                <button id="decrease">-</button>
                <input id="quantityInput" type="text" value="1" size="1">
                <button id="increase">+</button>
            </p>

            <script src="Assets/JS/Items_Quantity.js"></script>

            <div class="Buy_Cart">
                <a href="Buying_Details.php?name=<?php echo urlencode($product['Product_name']); ?>&price=<?php echo $product['Price']; ?>"><button class="Buying" >Buy Now</button></a>
                <button class="Cart">Add to Cart</button>
            </div>

        </div>
    </div>

    <div class="Other_details">
        <b><u>Seller's Address</u></b><br />

        <div class="fa fa-map-marker">
            <span class="Location">
                <i>Bagmati, Kathmandu Metro 22 - Shantinagar, New Baneshwor</i>
            </span>
        </div>

        <div class="Location"><i>Cash on delivery Available</i></div>
        <div class="Location warranty"><b>Return and Warranty</b></div>
        <div class="Location"><i>7 days free Returns</i></div>
        <div class="Location"><i>3 months warranty available</i></div>
    </div>

</div>

<!-- FEATURES / DESCRIPTION -->
<div class="Features">
    <p>
        <b>Product Details:</b><br><br>
        <?php
        if (!empty($product['Description'])) {
            echo nl2br($product['Description']);
        } else {
            echo "No additional features provided.";
        }
        ?>
    </p>
</div>

</body>
</html>
