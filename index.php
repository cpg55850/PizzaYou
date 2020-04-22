<?php
    include_once "./header.php";
?>

<body>
    <div id="showcase">
        <img id="fancyLogo" src="img/fancy_logo.png" alt="">
        <div id="bgImage"></div>
    </div>

    <div class="columnGrid">
        <div class="columnItem">
            <?php

        $query = "SELECT * FROM customer WHERE email = 'charliechip95@gmail.com'";
        $query_results = mysqli_query($conn, $query);

        if($query_results) {
            echo "Worked!";
            while($row = mysqli_fetch_array($query_results, MYSQLI_NUM)) {
                echo '
                <tr>
                    <td>
                        ' . $row[0] . '
                    </td>
                    <td>
                        ' . $row[1] . '
                    </td>
                    <td>
                        ' . $row[2] . '
                    </td>
                    <td>
                        ' . $row[3] . '
                    </td>
                    <td>
                    ' . $row[4] . '
                    </td>
                </tr>
            ';
            }
        }
    ?>

            <h3>Lorem ipsum</h3>
            <h2>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</h2>
            <a href="#">More Info</a>
        </div>

    </div>

</body>

<?php
    include_once "./footer.php";
?>

</html>