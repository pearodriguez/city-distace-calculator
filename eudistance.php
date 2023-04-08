<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mileage between European Capitals</h1>
    <p>Enter one of these cities to view their distance: <b>Berlin, Moscow, Paris, Prague,</b> or <b>Rome</b></p>
    <?php

    $Distances = array(
        "Berlin" => array("Berlin" => 0, "Moscow" => 1607.99, "Paris" => 876.96, "Prague" => 280.34, "Rome" => 1181.67),
        "Moscow" => array("Berlin" => 1609.99, "Moscow" => 0, "Paris" => 2484.92, "Prague" => 1664.04, "Rome" => 2374.26),
        "Paris" => array("Berlin" => 876.96, "Moscow" => 641.31, "Paris" => 0, "Prague" => 885.38, "Rome" => 1105.76),
        "Prague" => array("Berlin" => 280.34, "Moscow" => 1664.04, "Paris" => 885.38, "Prague" => 0, "Rome" => 922),
        "Rome" => array("Berlin" => 1181.67, "Moscow" => 2374.26, "Paris" => 1105.76, "Prague" => 922, "Rome" => 0)
    );
    $KMtoMiles = 0.62;

    if(isset($_POST['submit'])) {
        $first_city = trim(stripslashes($_POST['first_city'])); 
        $end_city = trim(stripslashes($_POST['end_city'])); 
        $distance = $Distances[$first_city][$end_city]; 
        $miles = round($distance * $KMtoMiles); 

        if(array_key_exists($first_city, $Distances) && array_key_exists($end_city, $Distances)) 
            echo "The distance between " . $first_city . " and " . $end_city . " is " . $miles . " miles\n"; 
        else
            echo "Error. Reset and try again."; 
    }

    ?>
    <form action="eudistance.php" method="post">
        <p>Start City: <input type="text" name="first_city" /></p>
        <p>End City: <input type="text" name="end_city" /></p>
        <p>
            <input type="submit" name="submit" value="Submit" />
            <input type="reset" name="reset" value="Reset Cities" />
        </p>
    </form>
</body>

</html>