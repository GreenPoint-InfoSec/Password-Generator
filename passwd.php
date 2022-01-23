<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Random Password Generator">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
    <link rel="icon" type="image/png" href="/assets/favicon/favicon.png" sizes="16x16">
    <link rel="icon" type="image/ico" href="/assets/favicon/favicon.ico" sizes="16x16">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Lato:ital,wght@0,300;0,400;1,300;1,400&family=Titillium+Web:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/master.css">
    <title>Random Password Generator</title>
  </head>

<?php

$lower = $upper = $digits = $characters = $passErr = $all = $password = "";
$length = 12;
$amount = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["length"])) {
    $passErr = "Password Length Required";
  }
  else {
    $length = $_POST["length"];
  }

  if (empty($_POST["amount"])) {
    $amount = 1;
  }
  else {
    $amount = $_POST["amount"];
  }

  if ($passErr == "") {
    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $uppercase = strtoupper($lowercase);
    $nums = "0123456789";
    $chars = "!\$%^&*()_+-=[]{};:'@#~\\|,./?<>";

    if ($_POST["lower"] == "on") {
      $all .= $lowercase;
    }
    if ($_POST["upper"] == "on") {
      $all .= $uppercase;
    }
    if ($_POST["digits"] == "on") {
      $all .= $nums;
    }
    if ($_POST["characters"] == "on") {
      $all .= $chars;
    }

  }

}

function password($input, $strength) {
  $password = "";
  for ($i=0; $i < $strength; $i++) {
    $random = $input[mt_rand(0, strlen($input) - 1)];
    $password .= $random;
  }

  return htmlspecialchars($password);

}

?>

<body>
  <div class="passwordForm">
    <form class="choice" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
      <label for="length">Length of passwords:</label>
      <input type="number" name="length" value="<?php echo $length ?>" class="slider" id="length">
      <br><div class="error" id="passErr"><?php echo $passErr; ?></div>
      <label for="amount">How many passwords:</label>
      <input type="number" name="amount" value="<?php echo $amount ?>" class="slider" id="amount"><br><br>
      <input type="checkbox" name="lower" checked>
      <label for="lower">Lowercase</label><br>
      <input type="checkbox" name="upper" checked>
      <label for="lower">Uppercase</label><br>
      <input type="checkbox" name="digits" checked>
      <label for="lower">Digit</label><br>
      <input type="checkbox" name="characters" checked>
      <label for="lower">Special Characters</label><br><br>
      <button type="submit" name="generate" class="button" id="button"><b>Generate Passwords</b></button><br>
    </form>

    <div class="output">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($passErr == "") {
          for ($i=0; $i < $amount ; $i++) {
            echo $output = "Password " .($i + 1) .": <span class=\"password\" id=\"password" .($i+1) ."\">" .password($all, $length) ."</span><br>";
          }
        }
      }
      ?>
    </div>
  </div>


</body>

</html>
