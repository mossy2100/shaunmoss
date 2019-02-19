<?php
header('Cache-Control: no-cache');
header('Cache-Control: max-age=0');

$css_filename = 'gymcalc.css';
$js_filename = 'gymcalc.js';
$add_timestamp = TRUE;
if ($add_timestamp) {
  $time = time();
  $css_filename .= "?$time";
  $js_filename .= "?$time";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="application-name" content="GymCalc">
  <meta name="author" content="Shaun Moss">
  <meta name="description" content="A simple tool for calculating weights for gym exercises.">
  <meta name="keywords" content="gym, fitness, calculator, barbell, dumbbell, plates">

  <title>GymCalc</title>

  <link rel="stylesheet" type="text/css" href="scss/<?= $css_filename ?>">

  <script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
  <script language="JavaScript" src="js/<?= $js_filename ?>"></script>

</head>
<body>

<div id="wrapper">

  <header>
    <h1>GymCalc</h1>
    <h2>Easily calculate weights in the gym</h2>
  </header>

  <div id="error"></div>

  <form id="gymcalc-form">

    <!-- Exercise type -->
    <div id="exercise-type-wrapper" class="field">
      <label for="exercise-type">Exercise type</label>
      <select id="exercise-type">
        <option value="barbell" selected>Barbell</option>
        <option value="dumbbell">Dumbbells</option>
        <option value="machine-plate">Plate-loaded machine</option>
        <option value="machine-pin">Pin-loaded machine</option>
      </select>
    </div>

    <!-- Goal weight -->
    <div id="goal-weight-wrapper" class="field">
      <label for="goal-weight">Goal weight</label>
      <input id="goal-weight" type="number" min="0" max="500" step="0.1">
      <span>kg</span>
    </div>

    <!-- Barbell -->
    <div id="bar-weight-wrapper" class="field">
      <label for="bar-weight">Bar weight</label>
      <input id="bar-weight" type="number" min="0" max="100" step="0.1">
      <span>kg</span>
    </div>

    <!-- Calculate plates for one side or both -->
    <div id="machine-split-wrapper" class="field">
      <input id="machine-split" type="checkbox" value="1" checked>
      <label for="machine-split">Get plates for one side only</label>
    </div>

    <!-- Rare plates -->
    <div id="rare-plates-wrapper" class="field">
      <span>Include</span>
      <input id="rare-plate-15" type="checkbox" value="1" checked>
      <label for="rare-plate-15">15 kg</label>
      <input id="rare-plate-25" type="checkbox" value="1" checked>
      <label for="rare-plate-25">25 kg</label>
      <span>plates</span>
    </div>

    <!-- Dumbbells -->
    <div id="num-dumbbells-wrapper" class="field">
      <span>Goal is for</span>
      <input id="num-dumbbells-1" name="num-dumbbells" type="radio" value="1" checked>
      <label for="num-dumbbells-1">1 or</label>
      <input id="num-dumbbells-2" name="num-dumbbells" type="radio" value="2">
      <label for="num-dumbbells-2">2 dumbbells</label>
    </div>

    <!-- Pin-loaded machine -->
    <div id="pin-stack-wrapper" class="field">
      <label for="pin-stack">Pin stack</label>
      <select id="pin-stack"></select>
      <span>kg</span>
    </div>

    <!-- Add-on weights -->
    <div id="addon-weights-wrapper" class="field">
      <label for="addon-weights">Available add-on weights</label>
      <div id="addon-weights"></div>
    </div>

    <!-- Calculate button -->
    <div class="field">
      <button type="button" id="calc">Calculate</button>
    </div>

  </form>

  <div id="results"></div>

</div>

</body>
</html>
