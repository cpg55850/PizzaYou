<?php
    include_once "./header.php";
?>

<div class="container">
    <h2>Pizzas</h2>
    <?php
        $query = "SELECT * FROM pizzas;";
        $query_results = mysqli_query($conn, $query);

        if($query_results) {
            while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                echo '
                <tr>
                    <td><b>
                        ' . $row[1] . '
                    </b></td><br>
                    <td>
                        ' . $row[2] . '
                    </td>
                    <td>$' . $row[3] . '
                    </td>
                    
                </tr><br><br>
            ';
            }
        }
    ?>

    <h2>Drinks</h2>
    <?php
        $query = "SELECT * FROM drinks;";
        $query_results = mysqli_query($conn, $query);

        if($query_results) {
            while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                echo '
                <tr>
                    <td><b>
                        ' . $row[1] . '
                    </b></td>
                </tr><br>
            ' . $row[2] . '<br><br>';
            }
        }
    ?>

    <h2>Toppings</h2>
    <?php
        $query = "SELECT * FROM toppings;";
        $query_results = mysqli_query($conn, $query);

        if($query_results) {
            while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                echo '
                <tr>
                    <td>
                        ' . $row[1] . '
                    </td>
                </tr><br><br>
            ';
            }
        }
    ?>

    <h2>Sauces</h2>
    <?php
        $query = "SELECT * FROM sauce;";
        $query_results = mysqli_query($conn, $query);

        if($query_results) {
            while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                echo '
                <tr>
                    <td>
                        ' . $row[1] . '
                    </td><br><br>
            ';
            }
        }
    ?>
</div>

<?php
    include_once "./footer.php";
?>