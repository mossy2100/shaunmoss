($ => {
  const plateWeights = [1.25, 2.5, 5, 10, 20, 25];
  let dumbbellWeights;
  const percentages = [50, 70, 100, 90, 80];

  /**
   * Array sorting function for an ascending numerical sort.
   */
  function sortAsc(a, b) {
    return a - b;
  }

  /**
   * Array sorting function for a descending numerical sort.
   */
  function sortDesc(a, b) {
    return b - a;
  }

  /**
   * Build the dumbbell weights array.
   */
  function setupDbWeights() {
    dumbbellWeights = new Set();
    for (let i = 1; i <= 10; i++) {
      dumbbellWeights.add(i);
    }
    for (let i = 8; i <= 20; i += 2) {
      dumbbellWeights.add(i);
    }
    for (let i = 12.5; i <= 60; i += 2.5) {
      dumbbellWeights.add(i);
    }
    // Convert to array, sorted by value.
    dumbbellWeights = [...dumbbellWeights];
    dumbbellWeights.sort(sortAsc);
  }

  /**
   * Calculate the best combination of plates, given the specified parameters.
   *
   * @param {float} idealTotal
   *   The ideal total weight.
   * @param {float} bar
   *   The bar weight for a barbell, or starting resistance for a machine.
   * @param {bool} split
   *   If the weight of the plates needs to be divided in half.
   *
   * @return {object}
   *   The closest weight possible and the plate weights to select.
   */
  function calcPlates(idealTotal, bar, split) {
    // Calculate the split factor.
    const factor = split ? 2 : 1;

    // Can't go lower than the bar weight.
    if (idealTotal <= bar) {
      return { closest: bar, platesWeight: 0, plates: [] };
    }

    // Calculate the ideal weight of plates for one end of the bar.
    const idealPlates = (idealTotal - bar) / factor;

    // Calculate closest matching plate setup.
    const plates = [];
    let remainder = idealPlates;
    let closestBelow = 0;
    const plateWeightsDesc = plateWeights.slice(0);
    plateWeightsDesc.sort(sortDesc);
    let plateFound = true;
    let plateWeight;

    // Calculate the closest weight below the ideal weight.
    while (plateFound) {
      // Look for the largest plate with a weight less than the remainder.
      plateFound = false;
      for (let i = 0; i < plateWeightsDesc.length; i++) {
        plateWeight = plateWeightsDesc[i];
        if (plateWeight <= remainder) {
          // Plate found.
          remainder -= plateWeight;
          closestBelow += plateWeight;
          plates.push(plateWeight);
          // Stop looking.
          plateFound = true;
          break;
        }
      }
    }

    // If we have an exact match, done.
    let closest;
    if (closestBelow === idealPlates) {
      closest = closestBelow * factor + bar;
      return { closest, platesWeight: closestBelow, plates };
    }

    // Add the smallest plate to find the next weight above the ideal.
    const smallestPlate = plateWeights[0];
    const closestAbove = closestBelow + smallestPlate;
    const diffBelow = idealPlates - closestBelow;
    const diffAbove = closestAbove - idealPlates;

    // If the above weight is closer to the ideal, or if it's 50-50, take the above weight.
    if (diffAbove <= diffBelow) {
      // Recalculate to find the best plate mix for closest weight above.
      return calcPlates(closestAbove * factor + bar, bar, split);
    }

    // Below weight is closer to the ideal.
    closest = closestBelow * factor + bar;
    return { closest, platesWeight: closestBelow, plates };
  }

  /**
   * Calculate the best combination of plates, given the specified parameters.
   *
   * @param {float} idealTotal
   *   The ideal total weight.
   *
   * @return {float}
   *   The dumbbell weight that, if doubled, would be closest to the ideal.
   */
  function calcDumbbell(idealTotal) {
    const idealDumbbellWeight = idealTotal / 2;

    // Can't go lower than the smallest dumbbell weight.
    if (idealDumbbellWeight <= dumbbellWeights[0]) {
      return dumbbellWeights[0];
    }

    let closestAbove;
    let i;
    for (i = 0; i < dumbbellWeights.length; i++) {
      if (dumbbellWeights[i] === idealDumbbellWeight) {
        // Found exact match.
        return dumbbellWeights[i];
      }
      if (dumbbellWeights[i] > idealDumbbellWeight) {
        // Found lowest-weight dumbbell with weight above the ideal.
        closestAbove = dumbbellWeights[i];
        break;
      }
    }

    // Get the dumbbell with the highest weight lower than the ideal.
    const closestBelow = dumbbellWeights[i - 1];

    // Find out which dumbbell is closer in weight to the ideal.
    const diffBelow = idealDumbbellWeight - closestBelow;
    const diffAbove = closestAbove - idealDumbbellWeight;

    // If the above weight is closer to the ideal, or if it's 50-50, take the above weight.
    if (diffAbove <= diffBelow) {
      return closestAbove;
    }

    // Below weight is closer to the ideal.
    return closestBelow;
  }

  /* ===================================================================================================================
   * Error functions.
   */

  /**
   * Display an error.
   *
   * @param {string} msg
   *   The error message.
   */
  function setError(msg) {
    $('#error').html(msg).show();
  }

  /**
   * Clear any error.
   */
  function clearError() {
    $('#error').html('').hide();
  }

  /* ===================================================================================================================
   * Calculation functions.
   */

  /**
   * Calculate and display the results.
   *
   * @param {bool} split
   *   If two equal sets of plates are needed.
   */
  function platesCalc(split) {
    let $result;
    let plateWeight;
    let platesHtml;
    let idealWeight;
    let closestPlates;

    const goal = parseFloat($('#goal-weight').val());
    if (!goal) {
      setError('Please set goal weight.');
      return;
    }

    const bar = parseFloat($('#bar-weight').val());
    const $results = $('#results');

    // Reset the results.
    $results.html('');

    // Calculate the closest we can get with the available plates.
    percentages.forEach(percent => {
      // Calculate ideal weight rounded to two decimal places (nearest 10 grams).
      idealWeight = Math.round(goal * percent) / 100;

      closestPlates = calcPlates(idealWeight, bar, split);

      // Generate HTML for the plates.
      platesHtml = '';
      for (let i = 0; i < closestPlates.plates.length; i++) {
        plateWeight = closestPlates.plates[i];
        platesHtml += `<span class="plate plate-${plateWeight.toString().replace('.', '-')}">${plateWeight}</span>`;
      }

      // Add the result.
      $result = $(`
        <div class="result-row">
          <h4>${percent}% of goal</h4>
          <div class="ideal"><label>Ideal</label><span>${idealWeight} kg</span></div>
          <div class="closest"><label>Closest</label><span>${closestPlates.closest} kg</span></div>
          <div class="closest"><label>Total plates</label><span>${closestPlates.platesWeight} kg</span></div>
          <div class="plates"><label>Plates setup</label><span>${platesHtml}</span></div>
        </div>`);
      $result.appendTo($results);
    });
  }

  function dumbbellCalc() {
    let idealWeight;
    let closestDumbbell;
    let $result;

    const goal = parseFloat($('#goal-weight').val());
    const $results = $('#results');

    // Reset the results.
    $results.html('');

    // Calculate the closest we can get with the available plates.
    percentages.forEach(percent => {
      // Calculate ideal weight rounded to two decimal places (nearest 10 grams).
      idealWeight = Math.round(goal * percent) / 100;
      closestDumbbell = calcDumbbell(idealWeight);
      // Add the result.
      $result = $(`
        <div class="result-row">
          <h4>${percent}% of goal</h4>
          <div class="ideal"><label>Ideal</label><span>${idealWeight} kg</span></div>
          <div class="closest"><label>Closest</label><span>${closestDumbbell * 2} kg</span></div>
          <div class="closest"><label>Each arm</label><span>${closestDumbbell} kg</span></div>
        </div>`);
      $result.appendTo($results);
    });
  }

  /**
   * Change the form to suit the exercise type, whenever it changes.
   */
  function modifyForm() {
    const exerciseType = $('#exercise-type').val();
    const $goalWeightWrapper = $('#goal-weight-wrapper');
    const $goalWeightLabel = $goalWeightWrapper.find('label');
    const $barWeightWrapper = $('#bar-weight-wrapper');
    const $barWeightLabel = $barWeightWrapper.find('label');

    // Determine if bar weight should be visible.
    if (exerciseType === 'dumbbell' || exerciseType === 'machine-pin') {
      $barWeightWrapper.hide();
    } else {
      $barWeightWrapper.show();
      // Set the label.
      if (exerciseType === 'barbell') {
        $barWeightLabel.html('Bar weight');
      } else {
        $barWeightLabel.html('Starting resistance');
      }
    }

    // Update goal weight label.
    if (exerciseType === 'dumbbell' || exerciseType === 'machine-plate-bi') {
      $goalWeightLabel.html('Goal weight (total, both arms)');
    } else {
      $goalWeightLabel.html('Goal weight');
    }
  }

  /**
   * Do the calculation.
   */
  function calculate() {
    const exerciseType = $('#exercise-type').val();
    switch (exerciseType) {
      case 'barbell':
      case 'machine-plate-bi':
        platesCalc(true);
        break;

      case 'machine-plate-uni':
        platesCalc(false);
        break;

      case 'dumbbell':
        dumbbellCalc();
        break;

      case 'machine-pin':
        break;

      default:
        break;
    }
  }

  /**
   * Initialise the form.
   */
  function init() {
    setupDbWeights();
    $('#exercise-type').change(modifyForm);
    $('#calc').click(calculate);
    $('input, select').click(clearError);
  }

  // Initialise when document ready.
  $(init);
})(jQuery);
