<!DOCTYPE html>
<html>
<head>
    <title>My Web Page</title>
</head>
<body>
    <h1>Welcome to My Web Page</h1>
    
    <p>This is a basic HTML template.</p>
    
    <?php

    function calculateItemCost($item, $quantity){
        $itemPrices = array(
            'item1' => 10,
            'item2' => 15,
            'item3' => 20
        );

        if (array_key_exists($item, $itemPrices)){
            $itemPrice = $itemPrices[$item];
            return $itemPrice * $quantity;
        } else {
            return 0;
        }
    }


    if(isset($_GET['item']) && isset($_GET['quantity'])){
        $selectedItem = $_GET['item'];
        $itemQuantity = $_GET['quantity'];

        $itmeCost = calculateItemCost($selectedItem, $itemQuantity);

        echo "COST is $itmeCost";
    }

    ?>

</body>
</html>