<?php
	$product_description = filter_input(INPUT_POST, 'product_description');
	$list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
	$discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_INT);
	
    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;
    
    $list_price_f = "$".number_format($list_price, 2);
    $discount_percent_f = $discount_percent."%";
    $discount_f = "$".number_format($discount, 2);
    $discount_price_f = "$".number_format($discount_price, 2);

    // set default error message of empty string
    $error_message = '';

    // validate product description
    if (empty($product_description)) {
        $error_message .= 'Product description cannot be empty.<br>';
    }

    // validate list price
    if ($list_price === FALSE) {
        $error_message .= 'List price must be a valid number.<br>';
    } else if ($list_price <= 0) {
        $error_message .= 'List price must be greater than zero.<br>';
    } 

    // validate percent price
    if ($discount_percent === FALSE) {
        $error_message .= 'Discount percent must be a valid whole number.<br>';
    } else if ($discount_percent < 0) {
        $error_message .= 'Discount percent must be greater than or equal to zero.<br>';
    }
    
    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    // calculate sales tax (8% of discounted price)

    $sales_tax = 0.08;
    $sales_tax_rate = '8%';
    $sales_tax_amt = $discount_price * $sales_tax;
    $sales_tax_amt_f = '$'.number_format($sales_tax_amt, 2);
    $sales_total = $discount_price + $sales_tax_amt; 
    $sales_total_f = "$".number_format($sales_total, 2);
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

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

        <label>Discount Percent:</label>
        <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo htmlspecialchars($discount_f); ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo htmlspecialchars($discount_price_f); ?></span><br>

        <!-- display the sales tax rate, the calculated sales tax amount, and the sales 
            total after the discounted price. -->
        <label>Sales Tax Rate:</label>
        <span><?php echo htmlspecialchars($sales_tax_rate); ?></span><br>

        <label>Sales Tax Amount:</label>
        <span><?php echo htmlspecialchars($sales_tax_amt_f); ?></span><br>

        <label>Sales Total:</label>
        <span><?php echo htmlspecialchars($sales_total_f); ?></span><br>
    </main>
</body>
</html>