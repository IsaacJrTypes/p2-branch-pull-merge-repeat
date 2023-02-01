<?php

//logic for Fahrenheit to Celcius, Celcius to Fahrenheit and Fahrenheit to Kelvin.

//fahrenheit to celcius - (F - 32) * 5/9 = C
//celcius to fahrenheit - (C * 9/5) + 32 = F
//fahrenheit to kelvin - (F + 459.67) * 5/9 = K
//kelvin to fahrenheit - (K * 9/5) - 459.67 = F
//celcius to kelvin - C + 273.15 = K
//kelvin to celcius - K - 273.15 = C

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userInput']) !=='' && isset($_POST['tempA']) && isset($_POST['tempB'])) {
        $userInput = $_POST['userInput'];
        $tempA = $_POST['tempA'];
        $tempB = $_POST['tempB'];

        // convert temperature
        if ($tempA == 'fahr' && $tempB == 'cel') {
            $result = round(($userInput - 32) * 5/9,2);
        } elseif ($tempA == 'cel' && $tempB == 'fahr') {
            $result = round(($userInput * 9/5) + 32,2);
        } elseif ($tempA == 'fahr' && $tempB == 'kel') {
            $result = round(($userInput + 459.67) * 5/9,2);
        } elseif ($tempA == 'kel' && $tempB == 'fahr') {
            $result = round(($userInput * 9/5) - 459.67,2);
        } elseif ($tempA == 'cel' && $tempB == 'kel') {
            $result = round($userInput + 273.15,2);
        } elseif ($tempA == 'kel' && $tempB == 'cel') {
            $result = round($userInput - 273.15,2);
        }
    }

    // error handling

    if ($_POST['userInput'] === '') {
        $result = 'Please enter a number';
    } elseif (!isset($_POST['tempA'])) {
        $result = 'Please select a temperature type';
    } elseif (!isset($_POST['tempB'])) {
        $result = 'Please select a temperature type to convert to';
    } elseif ($_POST['tempA'] == $_POST['tempB']) {
        $result = 'Please select a different temperature type to convert to';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Temperature Converter 1.0</title>
</head>
<body>
    <form action="" method="POST">
    <fieldset>
        <legend>Temperature Converter</legend>
        <label>Input Number:</label>
      <input type="number" name="userInput" value="<?php if (
          isset($_POST['userInput'])
      ) {
          echo $_POST['userInput'];
      } ?>">
    <!-- Temp A here  -->
        <label>Temperature Type:</label>
        <ul>
        <li><input type="radio" name="tempA" value="fahr" <?php if (isset($tempA) && $tempA == 'fahr') {
            echo 'checked="checked"';
        } ?>> Fahrenheit (&#8457;)</li>
        <li><input type="radio" name="tempA" value="cel" <?php  if (isset($tempA) && $tempA == 'cel') {
            echo 'checked="checked"';
        }?>> Celsius (&#8451;)</li>
        <li><input type="radio" name="tempA" value="kel"  <?php if (isset($tempA) && $tempA == 'kel') {
            echo 'checked="checked"';
        }?>> Kelvin (&#8490;)</li>
        </ul>

    <!-- Temp B here -->
        <label>Convert To:</label>
        <ul>
        <li><input type="radio" name="tempB" value="fahr" <?php if (isset($tempB) && $tempB == 'fahr') {
            echo 'checked="checked"';
        } ?>> Fahrenheit (&#8457;)</li>
        <li><input type="radio" name="tempB" value="cel" <?php if (isset($tempB) && $tempB == 'cel') {
            echo 'checked="checked"';
        } ?>> Celsius (&#8451;)</li>
        <li><input type="radio" name="tempB" value="kel" <?php if (isset($tempB) && $tempB == 'kel') {
            echo 'checked="checked"';
        } ?>> Kelvin (&#8490;)</li>
        </ul>
    <input type="submit" value="Convert">
    <input type="button" onClick="window.location.href='<?php echo $_SERVER['PHP_SELF'] ?>'" value="Reset">
    </fieldset>
</form>

    <div class="result">
    <?php
                if (isset($result)) {
                    echo $result;
                }
?>
    </div>
</body>
</html>