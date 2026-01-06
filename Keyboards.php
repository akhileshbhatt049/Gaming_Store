<!-- <!DOCTYPE html>
<html>
    <head>
        <title>
            Keyboards
        </title>
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
                <a href="Keyboards.html" class="nav-link active"
                    id="Size">Keyboard</a>
                <a href="Mouse.html" class="nav-link" id="Size">Mouse</a>
                <a href="Monitor.html" class="nav-link" id="Size">Monitor</a>
                <a href="Headphone.html" class="nav-link"
                    id="Size">Headphone</a>
                <a href="Chairs.html" class="nav-link" id="Size">Chair</a>
            </nav>
        </header>

        <div class="Keyboard_products">
            <div>
                <a href="Buy_keyboard1.html"><img src="Assets/Images/board1.webp" alt="Keyboard"
                    width="300" /></a>
                <div class="Keyboard_name">
                    <a href="Buy_keyboard1.html" style="color: white;">Razer BlackWidow V4 <br />
                    price=159.99$
                    </a>
                </div>
            </div>

            <div>
                <a href="Buy_keyboard2.html"><img src="Assets/Images/board2.jpg" alt="Keyboard"
                    width="280" /></a>
                <div class="Keyboard_name">
                    <a href="Buy_keyboard2.html" style="color: white;">Steelseries Apex Pro <br />
                    price=199.99$</a>
                </div>
            </div>

            <div>
                <a href="Buy_keyboard3.html"><img src="Assets/Images/board3.jpg" alt="Keyboard"
                    width="300"/></a>
                <div class="Keyboard_name">
                    <a href="Buy_keyboard3.html" style="color: white;">Corsair K70 RGB TKL <br />
                    price=149.99$</a>
                </div>
            </div>

            <div>
                <a href="Buy_keyboard4.html"><img src="Assets/Images/board4.jpg" alt="Keyboard"
                    width="300"/></a>
                <div class="Keyboard_name">
                    <a href="Buy_keyboard4.html" style="color: white;">Corsair K65 PRO MINI <br />
                    price=129.99$</a>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="infoot">
                <div class="social-icons">
                    <a href="https://www.Instagram.com" class="fa fa-instagram"
                        title="Instagram Link"></a>

                    <a href="https://www.facebook.com" class="fa fa-facebook"
                        title="Facebook Link"></a>

                    <a href="https://www.twitter.com" class="fa fa-twitter"
                        title="Twitter Link"></a>

                    <a href="https://www.Whatsapp.com" class="fa fa-whatsapp"
                        title="Whatsapp Link"></a>
                </div>
            </div>

            <div class="privacy">
                &copy; 2025 Website. All rights reserved.
                | <a href="#">Privacy Policy</a> |
                <a href="#">Terms of Service</a>
            </div>
        </footer>
    </body>
</html> -->


<?php
$conn = mysqli_connect("localhost", "root", "", "ProductDB") or die("Database connection failed");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keyboards</title>

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
        <a href="Keyboard.php" class="nav-link active" id="Size">Keyboard</a>
        <a href="Mouse.php" class="nav-link" id="Size">Mouse</a>
        <a href="Monitor.php" class="nav-link" id="Size">Monitor</a>
        <a href="Headphone.php" class="nav-link" id="Size">Headphone</a>
        <a href="Chairs.php" class="nav-link" id="Size">Chair</a>
    </nav>
</header>

<div class="Keyboard_products">

<?php
$sql = "SELECT * FROM PRODUCTS WHERE Category='Keyboard'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div>
            <a href="Buy_Product.php?id=<?php echo $row['ID']; ?>">
                <!-- <img src="<?php echo $row['Product_image']; ?>" alt="Keyboard" width="300"> -->
                 <img src="<?php echo htmlspecialchars($row['Product_image']); ?>" width="300">

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
    echo "<p style='color:white; font-size:20px;'>No keyboard products available.</p>";
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
