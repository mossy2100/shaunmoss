<?php
header('Cache-Control: no-cache');
header('Cache-Control: max-age=0');
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

  <link rel="stylesheet" type="text/css" href="scss/gymcalc.css?<?= time() ?>">

  <script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
  <script language="JavaScript" src="js/gymcalc.js?<?= time() ?>"></script>

</head>
<body>

<div id="wrapper">

  <header>
    <h1>GymCalc</h1>
    <h2>Easily calculate weights in the gym</h2>
  </header>

  <div id="error"></div>

  <form id="gymcalc-form">
    <div id="exercise-type-wrapper" class="field">
      <label for="exercise-type">Exercise type</label>
      <select id="exercise-type">
        <option value="barbell">Barbell</option>
        <option value="dumbbell">Dumbbell</option>
        <option value="machine-plate-uni">Unilateral plate-loaded machine</option>
        <option value="machine-plate-bi">Bilateral plate-loaded machine</option>
        <option value="machine-pin">Pin-loaded machine</option>
      </select>
    </div>
    <div id="goal-weight-wrapper" class="field">
      <label for="goal-weight">Goal weight (both arms/legs)</label>
      <input id="goal-weight" type="number" min="0" max="500" step="0.1">
      <span>kg</span>
    </div>
    <div id="bar-weight-wrapper" class="field">
      <label for="goal-weight">Bar weight</label>
      <input id="bar-weight" type="number" min="0" max="100" step="0.1">
      <span>kg</span>
    </div>
    <div id="pin-stack-wrapper" class="field">
      <label for="pin-stack">Pin stack</label>
      <select id="pin-stack"></select>
      <span>kg</span>
    </div>
    <div id="addon-weights-wrapper" class="field">
      <label for="addon-weights">Available add-on weights</label>
      <div id="addon-weights"></div>
    </div>
    <div class="field">
      <button type="button" id="calc">Calculate</button>
    </div>
  </form>

  <div id="results"></div>

</div>

</body>
</html>
