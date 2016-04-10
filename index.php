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

function getProductList(){
    
    global $dbConnection;
     
        $sql = "SELECT product_id, productName, price, calories FROM products WHERE 1";
    
    $namedParameters = array();

    if(isset($_GET['searchForm'])){
         
        if(!empty($_GET['productType'])){
            $sql .= " AND productTypeId = :productTypeId";
            $namedParameters[":productTypeId"] = $_GET['productType'];
            
        }
        if(!empty($_GET['maxPrice'])){
            $sql .= " AND price <= :maxPrice";
            $namedParameters["maxPrice"] = $_GET['maxPrice'];
        }
        if(isset($_GET['healthyChoice'])){
            $sql .= " AND healthy = 1";
        }
        if(isset($_GET['orderBy'])){
            $sql .= " ORDER BY " . $_GET['orderBy'];
        }
        if(isset($_GET['order'])){
            $sql .= $_GET['order'];
        }
        
    }
    else{
        $sql = "SELECT product_id, productName, price, calories FROM products ORDER BY price";
        
    }
    
    print_r($sql);
    echo "<br/><br/><br/><br/>";

    $statement = $dbConnection->prepare($sql);
    $statement -> execute($namedParameters);
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
            <strong> Product Type: </strong>
            <select name = "productType">
                
                    <option value = ""> All </option>
                   <?php
                   
                        $productTypes = getProductTypes();
                        foreach ($productTypes as $productType) {
                            echo "<option value='".$productType['productTypeId']."'>" . $productType['productType'] . " </option>";  
                        }
                        
                    ?>
            </select>
              
              <br />
              <br />
              
              <strong> Maximum Price: </strong>
              <input type="text" name="maxPrice" size = 5/>
              
              <br/>
              <br />
              <input type = "checkbox" name = "healthyChoice"> <strong> Click to see all foods of Healthy Choice </strong>
              
              <br />
              <br />
              <strong> Order results by: </strong>
              <input type = "radio" name = "orderby" value = " name"> Product Name
              <input type = "radio" name = "orderBy" value = " price"> Price
              
              <br />
               <strong> In: </strong>
               <input type = "radio" name = "order" value = " ASC"> Ascending Order
               <input type = "radio" name = "order" value = " DESC"> Descending Order
                
              <br />
              <br />
              <input type = "submit" value = "Search Products" name = "searchForm">
              <input type = "reset" value = "reset" name = "reset">
        </form>
        
        <div style = "float:left">
            
              <table class = " table" border=1>
              
              <tr>
                  <th> Product Name </th>
                  <th> Price </th>
                  <th> Calories </th>
              </tr>
              
              <?php
              
               $productList = getProductList();
               foreach($productList as $productItem) {
                   echo "<tr>";
                   echo "<td><a href='getProductInfo.php?productId=".$productItem['productId']."' target= 'producsInfoiframe'> " . $productItem['productName'] . "</a></td>";
                   echo "<td>" . $productItem['price'] . "</td>";
                   echo "<td>" . $productItem['calories'] . "</td>";
                   echo "</tr>";
               }
              
              ?>
              
              </table>
              
        </div>
        
        <div style = "float:left"></div>
            
            <iframe name = "producsInfoiframe" width="100" height="100" src="getProductsInfo.php" frameborder="1"></iframe>    
            
        </div>
    </body>
</html>