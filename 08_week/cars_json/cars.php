<?php
    // if the form has been sent, add the new car to file
    $cars = json_decode(file_get_contents("cars.json"), true);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_car = array(
        "Number" => $_POST["number"],
        "Make" => $_POST["make"],
        "Model" => $_POST["model"],
        "Color" => $_POST["color"]
        );
        array_push($cars, $new_car);
        file_put_contents("cars.json", json_encode($cars));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <style>
        #cars {
            border: 1px solid #000000;    
        }
        #cars th, #cars td {
            border: 1px solid #000000;
            padding: 5px;
        }

        label {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <h3>Current cars</h3>

    <table id="cars">
        <tr>
            <th>License number</th>
            <th>Make</th>
            <th>Model</th>
            <th>Color</th>
        </tr>
        <?php
            // read the data from file and display as table rows
            foreach ($cars as $car) {
                echo "<tr>";
                foreach($car as $info) echo "<td>$info</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <h3>Add a new car</h3>
    <form action="cars.php" method="post">
        <p><label for="number">Number:</label><input type="text" id="number" name="number" required></p>
        <p><label for="make">Make:</label><input type="text" id="make" name="make" required></p>
        <p><label for="model">Model:</label><input type="text" id="model" name="model" required></p>
        <p><label for="Color">Color:</label><input type="text" id="color" name="color" required></p>
        <p><input type="submit" name="add-car" value="Add new car"></p>
    </form>
    
</body>
</html>