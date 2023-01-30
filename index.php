<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <li><input type="radio" name="tempA" value="fahr"> Fahrenheit</li>
        <li><input type="radio" name="tempA" value="cel"> Celsius</li>
        <li><input type="radio" name="tempA" value="kel"> Kelvin</li>
        </ul>

    <!-- Temp B here -->
        <label>Convert To:</label>
        <ul>
        <li><input type="radio" name="tempB" value="fahr"> Fahrenheit </li>
        <li><input type="radio" name="tempB" value="cel"> Celsius</li>
        <li><input type="radio" name="tempB" value="kel"> Kelvin</li>
        </ul>
    <input type="submit" value="Convert">
    </fieldset>
</form>
</body>
</html>