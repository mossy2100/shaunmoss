($ => {
  const percentages = [50, 70, 100, 90, 80];
  const plateWeights = [1.25, 2.5, 5, 10, 20, 25];
  // const plateWeights = [
  //   0.1, 0.125, 0.15, 0.175, 0.2, 0.225, 0.25,
  //   0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 2.25, 2.5,
  //   5, 7.5, 10, 12.5, 15, 17.5, 20, 22.5, 25
  // ];
  let dumbbellWeights;
  const pinStacks = [
    {
      name: '5-138',
      weights: [5, 12, 19, 26, 33, 40, 47, 54, 61, 68, 75, 82, 89, 96, 103, 110, 117, 124, 131, 138]
    },
    {
      name: '2.5-63.5',
      weights: [2.5, 6, 9.5, 13, 16.5, 20, 23.5, 28.5, 33.5, 38.5, 43.5, 48.5, 53.5, 58.5, 63.5]
    },
    {
      name: '2.5-45.5',
      weights: [2.5, 5, 7.5, 10, 12.5, 15, 17.5, 21, 24.5, 28, 31.5, 35, 38.5, 42, 45.5]
    }
  ];
  const addonWeights = [2.25, 2.25, 2.5, 2.5];

  /**
   * Round a number off to 3 decimal places.
   *
   * @param {number} x
   *   The initial number.
   *
   * @return {number}
   *   The rounded-off number.
   */
  function roundTo3DecimalPlaces(x) {
    return Math.round(x * 1000) / 1000;
  }

  /**
   * Array sorting function for an ascending numerical sort.
   *
   * @param {number} a
   *   The first number to compare.
   * @param {number} b
   *   The second number to compare.
   *
   * @return {number}
   *   The difference between the two parameters.
   */
  function sortAsc(a, b) {
    return a - b;
  }

  /**
   * Array sorting function for a descending numerical sort.
   *
   * @param {number} a
   *   The first number to compare.
   * @param {number} b
   *   The second number to compare.
   *
   * @return {number}
   *   The difference between the two parameters.
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
   * Initialise the pin stack select box.
   */
  function setupPinStacks() {
    const $pinStack = $('#pin-stack');
    pinStacks.forEach((value, index) => {
      $pinStack.append(`<option value="${index}">${value.name}</option>`);
    });
  }

  /**
   * Create the checkboxes so the user can select which add-on plates are avaialble.
   */
  function setupAddonWeights() {
    const $addonWeights = $('#addon-weights');
    addonWeights.forEach(value => {
      const $checkboxWrapper = $('<span>');
      $checkboxWrapper.append(`<input type="checkbox" value="${value}">`);
      $checkboxWrapper.append(`<label>${value}</label>`);
      $addonWeights.append($checkboxWrapper);
    });
    $addonWeights.append('&nbsp;kg');
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
    $('#error')
      .html(msg)
      .show();
  }

  /**
   * Clear any error.
   */
  function clearError() {
    $('#error')
      .html('')
      .hide();
  }

  /* ===================================================================================================================
   * Calculation functions.
   */

  /**
   * Calculate the best combination of plates, given the specified parameters.
   *
   * @param {number} idealTotal
   *   The ideal total weight.
   * @param {number} bar
   *   The bar weight for a barbell, or starting resistance for a machine.
   * @param {boolean} split
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
    const idealPlates = roundTo3DecimalPlaces((idealTotal - bar) / factor);

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
   * @param {number} idealTotal
   *   The ideal total weight.
   *
   * @return {number}
   *   The dumbbell weight that, if doubled, would be closest to the ideal.
   */
  function calcDumbbell(idealTotal) {
    const idealDumbbellWeight = roundTo3DecimalPlaces(idealTotal / 2);

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

  /**
   * Return all combinations of a bag of items plus one item selected from a box of items.
   *
   * Thus, if there are four items in the box, there will be four combinations in the result.
   *
   * @param {Array} bag
   *   The current selected items.
   * @param {Array} box
   *   Other items that we can select from.
   *
   * @return {Array}
   *   All combinations of items from bag and box.
   */
  function getCombinations(bag, box) {
    let newBag;
    let newBox;
    let boxLeft;
    let boxRight;
    let combinations = [];
    let item;

    // Terminating condition.
    if (box.length === 0) {
      // Only one possible combination.
      return [bag];
    }

    // First option is to choose none from the box.
    combinations.push(bag);

    // Second set of options is to choose one item from the box and add it to the bag.
    // i.e.
    // combinations[1] = combinations(bag + box[0], box - box[0]);
    // combinations[2] = combinations(bag + box[1], box - box[1]);
    // etc.

    // Loop through the items in the box.
    for (let j = 0; j < box.length; j++) {
      // Copy the arrays.
      newBag = bag.slice();
      newBox = box.slice();

      // Get the current item.
      item = box[j];

      // Remove the item from the box.
      if (j === 0) {
        // Remove item from start of box.
        item = newBox.shift();
      } else if (j === box.length - 1) {
        // Remove item from end of box.
        item = newBox.pop();
      } else {
        // Remove item from middle of array.
        boxLeft = box.slice(0, j);
        boxRight = box.slice(j + 1);
        newBox = boxLeft.concat(boxRight);
      }

      // Put the item in the bag in sort order.
      newBag.push(item);
      newBag.sort(sortAsc);

      // Get all new combinations.
      combinations = combinations.concat(getCombinations(newBag, newBox));
    }

    return combinations;
  }

  /**
   * Calculate the best combination of pin setting plus add-on plates.
   *
   * @param {number} idealTotal
   *   The ideal total weight.
   *
   * @return {object}
   *   Object containing information about the ideal weight, closest weight, pin setting, and add-on weights.
   */
  function calcPinWeights(idealTotal) {
    // Get the selected pin stack.
    const pinStack = pinStacks[$('#pin-stack').val()];
    const pinWeights = pinStack.weights;

    // Get the available add-on weights.
    const availableAddOnWeights = [];
    $('#addon-weights input[type="checkbox"]:checked').each((i, el) => {
      availableAddOnWeights.push(parseFloat($(el).val()));
    });

    // Get all combinations of add-on weights.
    const addonCombinations = getCombinations([], availableAddOnWeights);
    const strAddonCombinations = [];
    addonCombinations.forEach(value => {
      strAddonCombinations.push(JSON.stringify(value));
    });
    const strUniqueAddonCombinations = [...new Set(strAddonCombinations)];
    const uniqueAddonCombinations = [];
    strUniqueAddonCombinations.forEach(value => {
      uniqueAddonCombinations.push(JSON.parse(value));
    });

    // Get all combinations of pin weight plus add-on weights.
    const combinations = [];
    let totalWeight;
    let addons;
    let addonsWeight;
    pinWeights.forEach(pinWeight => {
      for (let i = 0; i < uniqueAddonCombinations.length; i++) {
        addons = uniqueAddonCombinations[i];
        addonsWeight = addons.reduce((total, value) => total + value, 0);
        totalWeight = pinWeight + addonsWeight;
        combinations.push({ totalWeight, pinWeight, addonsWeight, addons });
      }
    });

    // Sort the combinations by total weight.
    combinations.sort((a, b) => {
      if (a.totalWeight === b.totalWeight) {
        return a.addonsWeight - b.addonsWeight;
      }
      return a.totalWeight - b.totalWeight;
    });

    // Remove unnecessary combinations.
    const combinations2 = [];
    let current = 0;
    for (let i = 0; i < combinations.length; i++) {
      if (combinations[i].totalWeight > current) {
        // Add it.
        combinations2.push(combinations[i]);
        // Update the current weight.
        current = combinations[i].totalWeight;
      }
    }

    // If the lowest weight is greater than or equal to the ideal, use that.
    if (combinations2[0].totalWeight >= idealTotal) {
      return combinations2[0];
    }

    // If the highest weight is less than or equal to the ideal, use that.
    if (combinations2[combinations2.length - 1].totalWeight <= idealTotal) {
      return combinations2[combinations2.length - 1];
    }

    // Find closest total weights equal to, or below and above the ideal.
    let j;
    for (j = 0; j < combinations2.length; j++) {
      // Check for exact match.
      if (combinations2[j].totalWeight === idealTotal) {
        return combinations2[j];
      }
      // Check for closest above.
      if (combinations2[j].totalWeight > idealTotal) {
        break;
      }
    }

    // Find out which weight is closer to the ideal, the one below or the one above.
    const closestBelow = combinations2[j - 1].totalWeight;
    const closestAbove = combinations2[j].totalWeight;
    const diffBelow = idealTotal - closestBelow;
    const diffAbove = closestAbove - idealTotal;

    // If the above weight is closer to the ideal, or if it's 50-50, take the higher weight.
    if (diffAbove <= diffBelow) {
      return combinations2[j];
    }

    // The lower weight is closer to the ideal.
    return combinations2[j - 1];
  }

  /* ===================================================================================================================
   * Functions to display results.
   */

  /**
   * Create the plates-wrapper element.
   *
   * @param {string} label
   *   The label text.
   * @param {Array} plates
   *   The plate weights.
   * @param {number} pinWeight
   *   The pin selection.
   *
   * @return {Object}
   *   jQuery object representing the new element.
   */
  function createPlatesWrapperElement(label, plates, pinWeight = 0) {
    if (pinWeight) {
      plates.unshift(pinWeight);
    }

    const $platesWrapper = $(`<div class="plates-wrapper">`);
    const $plates = $(`<span class="plates">`);

    if (!plates.length) {
      $plates.html('None');
    } else {
      // Get the maximum height needed.
      let maxHeight = 0;
      if (pinWeight > 0) {
        maxHeight = 10;
      } else {
        plates.forEach(plateWeight => {
          const height = (plateWeight + 25) / 5;
          if (height > maxHeight) {
            maxHeight = height;
          }
        });
      }

      // Add the label.
      const $label = $(`<label>${label}</label>`);
      $label.css('line-height', `${maxHeight}em`);
      $platesWrapper.append($label);

      // Create elements for the plate weights.
      plates.forEach((plateWeight, i) => {
        let plateClass;
        let height;
        let margin;
        if (i === 0 && pinWeight > 0) {
          plateClass = 'pin-selection';
          height = 10;
          margin = 0;
        } else {
          plateClass = `plate-${plateWeight.toString().replace('.', '_')}`;
          height = (plateWeight + 25) / 5;
          margin = roundTo3DecimalPlaces((maxHeight - height) / 2);
        }

        const $plate = $(`<span class="plate ${plateClass}">${plateWeight}</span>`);
        $plate.css({
          height: `${height}em`,
          'margin-top': `${margin}em`,
          'margin-bottom': `${margin}em`
        });
        $plates.append($plate);
      });
    }

    $platesWrapper.append($plates);
    return $platesWrapper;
  }

  /**
   * Calculate and display the results.
   *
   * @param {boolean} split
   *   If two equal sets of plates are needed.
   */
  function showPlates(split) {
    // Get the goal weight.
    const goal = parseFloat($('#goal-weight').val());
    if (!goal) {
      setError('Please set goal weight.');
      return;
    }

    // Get the bar weight.
    let bar = $('#bar-weight').val();
    bar = bar === '' ? 0 : parseFloat(bar);

    // Reset the results.
    const $results = $('#results');
    $results.html('');

    // Calculate the closest we can get with the available plates.
    percentages.forEach(percent => {
      // Calculate ideal weight rounded to two decimal places (nearest 10 grams).
      const idealWeight = roundTo3DecimalPlaces(goal * (percent / 100));

      const { closest, platesWeight, plates } = calcPlates(idealWeight, bar, split);

      // Add the result.
      const $row = $(`<div class="result-row">`);
      const setup = split ? `[${platesWeight}]=${bar}=[${platesWeight}]` : `${bar}=[${platesWeight}]`;
      $row.append(`
        <h3>${percent}% of goal</h3>
        <div class="ideal"><label>Ideal</label><span>${idealWeight} kg</span></div>
        <div class="closest"><label>Closest</label><span>${closest} kg</span></div>
        <div class="setup"><label>Setup</label><span>${setup}</span></div>`);
      const $platesWrapper = createPlatesWrapperElement('Plates', plates);
      $row.append($platesWrapper);
      $results.append($row);
    });
  }

  function showDumbbells() {
    let idealWeight;
    let closestDumbbell;
    let $result;

    // Get the goal weight.
    const goal = parseFloat($('#goal-weight').val());
    if (!goal) {
      setError('Please set goal weight.');
      return;
    }

    // Reset the results.
    const $results = $('#results');
    $results.html('');

    // Calculate the closest we can get with the available plates.
    percentages.forEach(percent => {
      // Calculate ideal weight rounded to two decimal places (nearest 10 grams).
      idealWeight = roundTo3DecimalPlaces(goal * (percent / 100));
      closestDumbbell = calcDumbbell(idealWeight);
      // Add the result.
      $result = $(`
        <div class="result-row">
          <h3>${percent}% of goal</h3>
          <div class="ideal"><label>Ideal</label><span>${idealWeight} kg</span></div>
          <div class="closest"><label>Closest</label><span>${closestDumbbell * 2} kg</span></div>
          <div class="dumbbell"><label>Dumbbells</label><span>${closestDumbbell} kg</span></div>
        </div>`);
      $result.appendTo($results);
    });
  }

  function showPinWeights() {
    // Get the goal weight.
    const goal = parseFloat($('#goal-weight').val());
    if (!goal) {
      setError('Please set goal weight.');
      return;
    }

    // Reset the results.
    const $results = $('#results');
    $results.html('');

    // Calculate the closest we can get with the available plates.
    percentages.forEach(percent => {
      // Calculate ideal weight rounded to two decimal places (nearest 10 grams).
      const idealWeight = roundTo3DecimalPlaces(goal * (percent / 100));

      // Get the best combination of pin setting plus weights.
      const { totalWeight, pinWeight, addons } = calcPinWeights(idealWeight);
      addons.sort(sortDesc);

      // Add the result.
      const $row = $(`<div class="result-row">`);
      $row.append(`
       <h3>${percent}% of goal</h3>
        <div class="ideal"><label>Ideal</label><span>${idealWeight} kg</span></div>
        <div class="closest"><label>Closest</label><span>${totalWeight} kg</span></div>`);
      const $addonsWrapper = createPlatesWrapperElement('Setup', addons, pinWeight);
      $row.append($addonsWrapper);
      $results.append($row);
    });
  }

  /**
   * Change the form to suit the exercise type, whenever it changes.
   */
  function modifyForm() {
    const exerciseType = $('#exercise-type').val();
    const $barWeightWrapper = $('#bar-weight-wrapper');
    const $barWeightLabel = $barWeightWrapper.find('label');
    const $pinStackWrapper = $('#pin-stack-wrapper');

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

    // Determine if pin stack and add-on plates should be visible.
    if (exerciseType === 'machine-pin') {
      $pinStackWrapper.show();
    } else {
      $pinStackWrapper.hide();
    }

    // Reset the results.
    const $results = $('#results');
    $results.html('');
  }

  /**
   * Do the calculation.
   */
  function calculate() {
    const exerciseType = $('#exercise-type').val();
    switch (exerciseType) {
      case 'barbell':
      case 'machine-plate-bi':
        showPlates(true);
        break;

      case 'machine-plate-uni':
        showPlates(false);
        break;

      case 'dumbbell':
        showDumbbells();
        break;

      case 'machine-pin':
        showPinWeights();
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
    setupPinStacks();
    setupAddonWeights();
    modifyForm();
    $('#exercise-type').change(modifyForm);
    $('#calc').click(calculate);
    $('input, select').click(clearError);
  }

  // Initialise when document ready.
  $(init);
})(jQuery);
