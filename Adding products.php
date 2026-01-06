<?php
$conn = mysqli_connect("localhost", "root", "", "") or die("Connection failed");

// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS ProductDB";
mysqli_query($conn, $sql);
mysqli_select_db($conn, "ProductDB") or die("Could not select database");

// Create Table
$sql = "CREATE TABLE IF NOT EXISTS PRODUCTS(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Product_image VARCHAR(1000) NOT NULL,
    Product_name VARCHAR(500) NOT NULL,
    Price FLOAT NOT NULL,
    Description VARCHAR(5000) NOT NULL,
    Category VARCHAR(100) NOT NULL
)";
mysqli_query($conn, $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $Image = uniqid() . "_" . basename($_FILES['Image']['name']);
    $targetFile = $targetDir . $Image;

    if (move_uploaded_file($_FILES['Image']['tmp_name'], $targetFile)) {
        $Product_name = mysqli_real_escape_string($conn, $_POST['Product_name']);
        $Price = (float)$_POST['Price'];
        $Description = mysqli_real_escape_string($conn, $_POST['Description']);
        $Category = mysqli_real_escape_string($conn, $_POST['Category']);

        $sql = "INSERT INTO PRODUCTS(Product_image, Product_name, Price, Description, Category)
                VALUES('$targetFile', '$Product_name', '$Price', '$Description', '$Category')";
        mysqli_query($conn, $sql) or die("Could not insert data");
        echo "Product added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adding Products</title>
    <link rel="stylesheet" href="Assets/CSS/Adding products.css">
    <script src="Assets/JS/Dashboard.js"></script>
</head>

<body>
    <div class="Container">
        <div class="Sidebar">
            <h3><a href="#" id="Dashboard">Dashboard</a></h3>
            <h3><a href="#" id="Add-products">Add New Product</a></h3>
        </div>
        <div class="Main-content">
            <div id="Add-Product-Form">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <p><b style="font-size: 17px;">Select product image</b><br />
                        <input type="file" name="Image" accept="image/*" required style="font-size: 22px;" />
                    </p>
                    <p><b style="font-size: 17px;">Write product name</b><br />
                        <input type="text" name="Product_name" required style="font-size: 22px; padding-right:105px" />
                    </p>
                    <p><b style="font-size: 17px;">Product price</b><br />
                        <input type="text" name="Price" required style="font-size: 22px; padding-right:105px" />
                    </p>
                    <p><b style="font-size: 17px;">Product Details</b><br />
                        <textarea name="Description" style="font-size: 22px; padding-right:105px"></textarea>
                    </p>
                    <p><b style="font-size: 17px;">Select Category</b><br />
                        <select name="Category" required
                            style="font-size: 22px; padding-right:200px; text-align: center;">
                            <option value="" disabled selected>Category</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Headphone">Headphone</option>
                            <option value="Chair">Chair</option>
                        </select>
                    </p>
                    <p>
                        <button type="submit" style="
                            font-size: 22px;
                            padding: 12px 40px;
                            border-radius: 30px;
                            background-color: #cae03bff;
                            color: white;
                            border: none;
                            cursor: pointer;
                            margin-top: 10px;
                            position: relative;
                            left: 25%;">Add Product</button>
                    </p>
                </form>
            </div>

            <div id="Dashboard-Section" style="display: none;">
                <header>
                    <h2>Product Dashboard</h2>
                </header>

                <table border="1" cellpadding="5" cellspacing="0" style="text-align: center;">
                    <tr>
                        <th>S.No.</th>
                        <th>Image name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Category</th>
                    </tr>

                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM PRODUCTS");
                        $count = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$count}</td>";
                            echo "<td>" . (isset($row['Product_image']) ? basename($row['Product_image']) : 'No image') . "</td>";
                            echo "<td>" . (isset($row['Product_name']) ? $row['Product_name'] : 'No name') . "</td>";
                            echo "<td>" . (isset($row['Price']) ? $row['Price'] : 'No price') . "</td>";
                            echo "<td>" . (isset($row['Category']) ? $row['Category'] : 'No category') . "</td>";
                            echo "</tr>";

                            $count++;
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>