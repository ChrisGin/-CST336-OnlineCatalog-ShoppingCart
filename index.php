<?php

include('../../includes/database.php');
$dbConnection = getDatabaseConnection('shopping_cart');

function getProductTypes() {
    global $dbConnection;
    
    $sql = "SELECT * FROM productType";
    $statement = $dbConnection->prepare($sql);
    $statement -> execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

?>


<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title> Online Shopping Cart </title>
    </head>
    
    <body>
        <h5> Let's Shop ! </h5>
       
       <form>
            Product Type:
            <select name="productType">
                
                    <option value=""> All </option>
                   <?php
                    $productTypes = getProductTypes();
                    foreach ($productTypes as $productType) {
                        echo "<option value='".$productType['productTypeId']."'>" . $productType['productType'] . " </option>";  
                    }
                     ?>
              
              <br />
              
              Maximum Price:
              <input type="text" name="maxPrice" size = 5/>
              
              <br />
              <input type = "checkbox" name = "healthyChoice"> Healthy Choice
              
              <br />
              Order results by:
              <input type = "radio" name = "orderby" value = "name"> Product Name/
              <input type = "radio" name = "orderBy" value = "price" checked> Price
              
              <br />
              <input type = "submit" value = "Search Products" name = "searchForm">
        </form>
    </body>
</html>