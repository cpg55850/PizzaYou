<?php
    include_once "dbh.inc.php";

    $MondayCount = $TuesdayCount = $WednesdayCount = $ThursdayCount = $FridayCount = $SaturdayCount = $SundayCount = $numCheese = $numPepperoni = $numMeat = $numVeggie = 0;

    // Get the number of orders by pizza
    $query = "SELECT SUM(quantity) AS quantity, food_item_idfood_item AS item FROM PIZZA_YOU_food_item_ordered GROUP BY food_item_idfood_item";
    $query_results = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($query_results)){
        switch($row) {
            case $row['item'] == '1':
                $numCheese = $row['quantity'];
                break;
            case $row['item'] == '2':
                $numPepperoni = $row['quantity'];
                break;
            case $row['item'] == '5':
                $numMeat = $row['quantity'];
                break;
            case $row['item'] == '6':
                $numVeggie = $row['quantity'];
                break;
        }
    }

    // Get the number of orders by weekday
    $query = "SELECT COUNT(DAYNAME(order_date)) AS count, DAYNAME(order_date) AS o_date FROM PIZZA_YOU_orders GROUP BY o_date";
    $query_results = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($query_results)){
        switch($row) {
            case $row['o_date'] == 'Monday':
                $MondayCount = $row['count'];
                break;
            case $row['o_date'] == 'Tuesday':
                $TuesdayCount = $row['count'];
                break;
            case $row['o_date'] == 'Wednesday':
                $WednesdayCount = $row['count'];
                break;
            case $row['o_date'] == 'Thursday':
                $ThursdayCount = $row['count'];
                break;
            case $row['o_date'] == 'Friday':
                $FridayCount = $row['count'];
                break;
            case $row['o_date'] == 'Saturday':
                $SaturdayCount = $row['count'];
                break;
            case $row['o_date'] == 'Sunday':
                $SundayCount = $row['count'];
                break;
        }
    }
    
    $weekdayArr = array($MondayCount, $TuesdayCount, $WednesdayCount, $ThursdayCount, $FridayCount, $SaturdayCount, $SundayCount);
    $pizzaArr = array($numCheese, $numPepperoni, $numMeat, $numVeggie);
    $returnArr = array($weekdayArr, $pizzaArr);

    $myJSON = json_encode($returnArr);

    echo $myJSON;
?>