<?php
    session_start();

    include('../../includes/database.php');
    $dbConnection = getDatabaseConnection('shopping_cart');

    function displayCart()
    {
        global $dbConnection;
        $total = 0;
        echo "<table><tr><th>Product Name</th><th>Quantity</th><th>Unit Price</th></tr>";
        foreach($_SESSION['cart'] as $id => $item){
            echo "<tr>";
            echo "<td>$item[productName]</td>";
            echo "<td>$item[qty]</td>";
            echo "<td>$item[price]</td></tr>";
            $total += ($item['price'] * $item['qty']);
        }
        echo "</table>";
        echo $total;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title> Online Shopping Cart </title>
    </head>

    <body>
        <?=displayCart();?>
    </body>
</html>