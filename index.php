<?php
    // set default value of variables for initial page load
    if (!isset($product_description)) { $product_description = ''; }
    if (!isset($list_price)) { $list_price = ''; }
    if (!isset($discount_percent)) { $discount_percent = ''; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <main>
    <h1>Product Discount Calculator</h1> 
    <?php if (!empty($error_message)) { ?>
        <p class="error" style="color: red"><?php echo $error_message; ?></p>
    <?php } ?>
    <form action="display_discount.php" method="post">

        <div id="data">
            <label>Product Description:</label>
            <input type="text" name="product_description" 
                value="<?php echo htmlspecialchars($product_description); ?>">
            <br>

            <label>List Price:</label>
            <input type="text" name="list_price"
                value="<?php echo htmlspecialchars($list_price); ?>">
            <br>

            <label>Discount Percent:</label>
            <input type="text" name="discount_percent"
                value="<?php echo htmlspecialchars($discount_percent); ?>">
            <span>%</span><br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate Discount"><br>
        </div>

    </form>
    </main>
</body>
</html>