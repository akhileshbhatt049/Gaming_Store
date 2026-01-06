<?php
$conn = mysqli_connect("localhost", "root", "", "ProductDB") or die("Database connection failed");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Headphone</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="Assets/CSS/Keyboard.css">
</head>

<body>

<header>
    <div>
        <a href="Index.html" class="logo-text">GAMING STORE</a>
    </div>

    <nav>
        <a href="Keyboard.php" class="nav-link" id="Size">Keyboard</a>
        <a href="Mouse.php" class="nav-link" id="Size">Mouse</a>
        <a href="Monitor.php" class="nav-link" id="Size">Monitor</a>
        <a href="Headphone.php" class="nav-link active" id="Size">Headphone</a>
        <a href="Chairs.php" class="nav-link" id="Size">Chair</a>
    </nav>
</header>

<div class="Keyboard_products">

<?php
$sql = "SELECT * FROM PRODUCTS WHERE Category='Headphone'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div>
            <a href="Buy_Product.php?id=<?php echo $row['ID']; ?>">
                <img src="<?php echo './' . $row['Product_image']; ?>" alt="Headphone" width="300">
            </a>

            <div class="Keyboard_name">
                <a href="Buy_Product.php?id=<?php echo $row['ID']; ?>" style="color: white;">
                    <?php echo $row['Product_name']; ?><br>
                    price = <?php echo $row['Price']; ?>$
                </a>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p style='color:white; font-size:20px;'>No headphone products available.</p>";
}
?>

</div>

<footer class="footer">
    <div class="infoot">
        <div class="social-icons">
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-whatsapp"></a>
        </div>
    </div>

    <div class="privacy">
        &copy; 2025 Website. All rights reserved |
        <a href="#">Privacy Policy</a> |
        <a href="#">Terms of Service</a>
    </div>
</footer>

</body>
</html>
