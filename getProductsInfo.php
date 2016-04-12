<?php

include('../../includes/database.php');

function getProductInfo() {
    
   $dbConnection = getDatabaseConnection('shopping_cart');
   
   $sql = "SELECT product_id, productDescription 
           FROM products
           WHERE product_id = :product_id";
   $namedParameters = array(":product_id"=>$_GET['product_id']);
   $statement =  $dbConnection->prepare($sql);
   $statement->execute($namedParameters);
   return $statement->fetch(PDO::FETCH_ASSOC);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

        <?php
        
        $productInfo = getProductInfo();
        echo "<strong style= 'background-color:lightgrey;' >" . $productInfo['productDescription'] . "</strong>";
        echo "<br><img src='img/food/" . (string)$productInfo['product_id'] . ".jpg' alt='Food image' style='width=200'>";
        ?>

    </body>
</html>