<?php
    session_start();

    include('../../includes/database.php');
    $dbConnection = getDatabaseConnection('shopping_cart');

    function displayCart()
    {
        global $dbConnection;
        $total = 0;
        if( isset($_SESSION['cart']) ) {
            echo "<table><tr style='background:white;'><th>Product Name</th><th>Quantity</th><th>Unit Price</th></tr>";
            foreach($_SESSION['cart'] as $id => $item){
                echo "<tr style='background:white'>";
                echo "<td>$item[productName]</td>";
                echo "<td>$item[qty]</td>";
                echo "<td>$item[price]</td></tr>";
                $total += ($item['price'] * $item['qty']);
            }
            echo "</table>";
            echo "<p style='background:white;width:100px;'>$$total</p>";
        }
        else {
            echo "<h3 style='color:white;'>Cart is empty</h3>";
        }
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