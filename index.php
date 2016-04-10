<?php

session_start();
include('../../includes/database.php');
$dbConnection = getDatabaseConnection('shopping_cart');

    if( isset($_GET['action']) && $_GET['action'] == "add" ) {
        $id = intval($_GET['id']);
        if( isset($_SESSION['cart'][$id]) )
            $_SESSION['cart'][$id]['qty']++;

        else {
            $sql = "SELECT * FROM products WHERE product_id={$id}";
            $statement = $dbConnection->prepare($sql);
            $statement->execute();
            $records = $statement->fetch();
            if(count($records) == 0)
                $error = "no hay este producto";
            else {
                $_SESSION['cart'][$id] = array("productName" => $records['productName'], "qty" => 1, "price" => $records['price']);
            }
        }
    }

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
<<<<<<< HEAD
    
    //print_r($sql);
    //echo "<br/><br/><br/><br/>";
=======

    print_r($sql);
    echo "<br/><br/><br/><br/>";
>>>>>>> 02a16d6722d45bc9f050beee0db45faf8d6e7cd6

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
<<<<<<< HEAD
        <h5> Let's Shop ! </h5>

=======
        <h1> Order Foods </h1>

>>>>>>> upstream/master
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
<<<<<<< HEAD
              <input type="text" name="maxPrice" size = 5/>

              <br/>
              <br />
              <input type = "checkbox" name = "healthyChoice"> <strong> Click to see all foods of Healthy Choice </strong>

=======
              <input type="text" name="maxPrice" size = 15 />

              <br/>
              <br />
              <input type = "checkbox" name = "healthyChoice"> <strong> Healthy Choice </strong>

>>>>>>> upstream/master
              <br />
              <br />
              <strong> Filter by: </strong>
              <input type = "radio" name = "orderBy" value = " productName"> Product Name
              <input type = "radio" name = "orderBy" value = " price"> Price

              <br />
               <strong> Sort: </strong>
               <input type = "radio" name = "order" value = " ASC"> Ascending Order
               <input type = "radio" name = "order" value = " DESC"> Descending Order

              <br />
              <br />
              <input type = "submit" value = "Search" name = "searchForm" class = "SRbutton">
              <input type = "reset" value = "Reset" name = "reset" class = "SRbutton">
        </form>
<<<<<<< HEAD

        <div style = "float:left">

              <table class = " table" border=1>

=======

        <div id = "wrapper">

              <table class = "table" border=1>

>>>>>>> upstream/master
              <tr>
                  <th> Product Name </th>
                  <th> Price </th>
                  <th> Calories </th>
              </tr>

              <?php

               $productList = getProductList();
               foreach($productList as $productItem) {
                   echo "<tr>";
<<<<<<< HEAD
                   echo "<td><a href='getProductsInfo.php?product_id=".$productItem['product_id']."' target= 'productsInfoiframe'> " . $productItem['productName'] . "</a></td>";
=======
                   echo "<td><a href='getProductsInfo.php?productId=".$productItem['productId']."' target= 'producsInfoiframe'> " . $productItem['productName'] . "</a></td>";
>>>>>>> 02a16d6722d45bc9f050beee0db45faf8d6e7cd6
                   echo "<td>" . $productItem['price'] . "</td>";
                   echo "<td>" . $productItem['calories'] . "</td>";
                   echo "<td><a href=" . "index.php?action=add&id=$productItem[product_id]>Add to Cart</a></td>";
                   echo "</tr>";
               }

              ?>

              </table>
<<<<<<< HEAD
              
                  <iframe name = "productsInfoiframe" width="100" height="100" src="getProductsInfo.php" frameborder="1"></iframe>
            </div>
        
                <div style = "float:left"></div>
            
             </div>
             
=======
<<<<<<< HEAD

        </div>

        <div style = "float:left"></div>

            <iframe name = "producsInfoiframe" width="100" height="100" src="getProductsInfo.php" frameborder="1"></iframe>

=======
              <iframe name = "productsInfoiframe" width="100" height="100" src="getProductsInfo.php" frameborder="1"></iframe>
        </div>

        <div style = "float:center"></div>

>>>>>>> upstream/master
        </div>
>>>>>>> 02a16d6722d45bc9f050beee0db45faf8d6e7cd6
    </body>
</html>