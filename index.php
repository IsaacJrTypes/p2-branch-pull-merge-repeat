<?php

// known bugs:
// * after submitting, if you enter a blank value, it will display an error.
// * round result to 2 decimal places creates error
// * pressing convert with blank "Please enter a number" is no longer prompting error

//logic for Fahrenheit to Celcius, Celcius to Fahrenheit and Fahrenheit to Kelvin.

//fahrenheit to celcius - (F - 32) * 5/9 = C
//celcius to fahrenheit - (C * 9/5) + 32 = F
//fahrenheit to kelvin - (F + 459.67) * 5/9 = K
//kelvin to fahrenheit - (K * 9/5) - 459.67 = F
//celcius to kelvin - C + 273.15 = K
//kelvin to celcius - K - 273.15 = C


if (isset($_POST['userInput']) && isset($_POST['tempA']) && isset($_POST['tempB'])) {
    $userInput = $_POST['userInput'];
    $tempA = $_POST['tempA'];
    $tempB = $_POST['tempB'];

    // convert temperature
    if ($tempA == 'fahr' && $tempB == 'cel') {
        $result = ($userInput - 32) * 5/9;
    } elseif ($tempA == 'cel' && $tempB == 'fahr') {
        $result = ($userInput * 9/5) + 32;
    } elseif ($tempA == 'fahr' && $tempB == 'kel') {
        $result = ($userInput + 459.67) * 5/9;
    } elseif ($tempA == 'kel' && $tempB == 'fahr') {
        $result = ($userInput * 9/5) - 459.67;
    } elseif ($tempA == 'cel' && $tempB == 'kel') {
        $result = $userInput + 273.15;
    } elseif ($tempA == 'kel' && $tempB == 'cel') {
        $result = $userInput - 273.15;
    }
}


// error handling

if (!isset($_POST['userInput'])) {
    $result = 'Please enter a number';
} elseif (!isset($_POST['tempA'])) {
    $result = 'Please select a temperature type';
} elseif (!isset($_POST['tempB'])) {
    $result = 'Please select a temperature type to convert to';
} elseif (!isset($_POST['userInput'])) {
    $result = 'Please enter a number';
} elseif ($_POST['tempA'] == $_POST['tempB']) {
    $result = 'Please select a different temperature type to convert to';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" type="text/css" rel="stylesheet">
    <title>Document</title>
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
        } ?>> Fahrenheit</li>
        <li><input type="radio" name="tempA" value="cel" <?php  if (isset($tempA) && $tempA == 'cel') {
            echo 'checked="checked"';
        }?>> Celsius</li>
        <li><input type="radio" name="tempA" value="kel"  <?php if (isset($tempA) && $tempA == 'kel') {
            echo 'checked="checked"';
        }?>> Kelvin</li>
        </ul>

    <!-- Temp B here -->
        <label>Convert To:</label>
        <ul>
        <li><input type="radio" name="tempB" value="fahr" <?php if (isset($tempB) && $tempB == 'fahr') {
            echo 'checked="checked"';
        } ?>> Fahrenheit </li>
        <li><input type="radio" name="tempB" value="cel" <?php if (isset($tempB) && $tempB == 'cel') {
            echo 'checked="checked"';
        } ?>> Celsius</li>
        <li><input type="radio" name="tempB" value="kel" <?php if (isset($tempB) && $tempB == 'kel') {
            echo 'checked="checked"';
        } ?>> Kelvin</li>
        </ul>
    <input type="submit" value="Convert">
    <input type="button" onClick="window.location.href='<?php echo $_SERVER['PHP_SELF'] ?>'" value="Reset">
    </fieldset>
</form>

    <div class="result">
    <?php

                if (!isset($result)) {
                    echo '';
                } else {
                    echo $result;
                }
?>
    </div>
</body>
</html>