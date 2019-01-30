(($) => {

  const plateMasses = [1.25, 2.5, 5, 10, 20];
  const barMasses = [8, 20, 30];
  let dbMasses;

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
   * Build the dumbbell masses array.
   */
  function setupDbMasses() {
    dbMasses = new Set();
    for (let i = 1; i <= 10; i++) {
      dbMasses.add(i);
    }
    for (let i = 8; i <= 20; i += 2) {
      dbMasses.add(i);
    }
    for (let i = 12.5; i <= 60; i += 2.5) {
      dbMasses.add(i);
    }
    // Convert to array, sorted by value.
    dbMasses = [...dbMasses];
    dbMasses.sort(sortAsc);
  }

  /**
   * Sort the bar masses and create the selector.
   */
  function setupBarMasses() {
    barMasses.sort(sortAsc);
    const $barMassSelect = $('#bar-mass');
    barMasses.forEach(value => {
      $barMassSelect.append($('<option>', {value: value, text: value}));
    });
  }

  /**
   * Calculate the best combination of plates, given the goal mass, selected bar, and available plates.
   */
  function calcClosestMass(idealTotal, bar) {
    // Can't go lower than the bar mass.
    if (idealTotal <= bar) {
      return {closest: bar, eachEnd: 0, plates: []};
    }

    // Calculate the ideal mass of plates for one end of the bar.
    const idealPlates = (idealTotal - bar) / 2;

    // Calculate closest matching plate setup.
    let plates = [];
    let remainder = idealPlates;
    let closestBelow = 0;
    let plateMassesDesc = plateMasses.slice(0);
    plateMassesDesc.sort(sortDesc);
    let plateFound;
    let plateMass;
    let abovePlates;

    // Calculate the closest mass below the ideal mass.
    while (true) {
      // Look for the largest plate with a mass less than the remainder.
      plateFound = false;
      for (plateMass of plateMassesDesc) {
        if (plateMass <= remainder) {
          // Plate found.
          remainder -= plateMass;
          closestBelow += plateMass;
          plates.push(plateMass);
          // Stop looking.
          plateFound = true;
          break;
        }
      }
      if (!plateFound) {
        break;
      }
    }

    // If we have an exact match, done.
    let closest;
    if (closestBelow === idealPlates) {
      closest = closestBelow * 2 + bar;
      return {closest, eachEnd: closestBelow, plates};
    }

    // Add the smallest plate to find the next mass above the ideal.
    const smallestPlate = plateMasses[0];
    const closestAbove = closestBelow + smallestPlate;
    const diffBelow = idealPlates - closestBelow;
    const diffAbove = closestAbove - idealPlates;

    // If the above mass is closer to the ideal, or if it's 50-50, take the above mass.
    if (diffAbove <= diffBelow) {
      // Recalculate to find the best plate mix for closest mass above.
      return calcClosestMass(closestAbove * 2 + bar, bar);
    }

    // Below mass is closer to the ideal.
    closest = closestBelow * 2 + bar;
    return {closest, eachEnd: closestBelow, plates};
  }

  /**
   * Calculate and display the results.
   */
  function calcMasses() {
    // Declare vars.
    const bar = parseFloat($('#bar-mass').val());
    const $results = $('#results');
    let closestMasses = [];
    let $result;
    let p;
    let platesDesc;
    let strPlatesDesc;
    let ideal;

    // Calculate the ideal masses.
    let idealMasses = [];
    idealMasses[10] = parseFloat($('#goal-mass').val());
    for (let i = 5; i < 10; i++) {
      idealMasses[i] = idealMasses[10] * i / 10;
    }

    // Calculate the closest we can get with the available plates.

    // Reset the results.
    $results.html('');

    for (let i = 10; i >= 5; i--) {
      closestMasses[i] = calcClosestMass(idealMasses[i], bar);
      p = i * 10;

      // Get the strings we need.
      ideal = Math.round(idealMasses[i] * 100) / 100;
      platesDesc = closestMasses[i].plates;
      platesDesc.forEach((v, k) => {
        platesDesc[k] = `<span class="plate plate-${v.toString().replace('.', '-')}">${v}</span>`;
      });
      strPlatesDesc = platesDesc.join('');

      $result = $('' +
        `<div id="mass-${p}" class="result-row">` +
        `<h4>${p}% of goal</h4>` +
        `<div class="ideal"><label>Ideal</label><span>${ideal} kg</span></div>` +
        `<div class="closest"><label>Closest</label><span>${closestMasses[i].closest} kg</span></div>` +
        `<div class="closest"><label>Each end</label><span>${closestMasses[i].eachEnd} kg</span></div>` +
        `<div class="plates"><label>Plates</label><span>${strPlatesDesc}</span></div>` +
        '</div>');
      $result.appendTo($results);
    }
  }

  /**
   * Initialise the form.
   */
  function init() {
    setupDbMasses();
    setupBarMasses();
    $('#calc').click(calcMasses);
  }

  // Initialise when document ready.
  $(init);

})(jQuery);
