<?php

include('../../includes/database.php');

function getProductInfo() {
    
   $dbConnection = getDatabaseConnection('shopping_cart');
   
   $sql = "SELECT productDescription 
           FROM products
           WHERE product_id = :productId";
   $namedParameters = array(":productId"=>$_GET['productId']);
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
        echo $productInfo['productDescription'];
        
        
        ?>

    </body>
</html>