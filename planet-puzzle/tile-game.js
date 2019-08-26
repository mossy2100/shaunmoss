var board, puzzleSize = 3;
var tileElements, tilePositions;
var missingTile, blank = {};
var score, scoreOutput;
var done, doneOutput;

/**
 * Select a random integer between min and max.
 */
function randInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Select a random item from an array.
 */
function selectRandItem(items) {
  return items[Math.floor(Math.random() * items.length)];
}

function getMovableTiles() {
  var tiles = [];

  // Tile above.
  if (blank.row > 0) {
    tiles.push(board[blank.row - 1][blank.col]);
  }

  // Tile to the left.
  if (blank.col > 0) {
    tiles.push(board[blank.row][blank.col - 1]);
  }

  // Tile to the right.
  if (blank.col < puzzleSize - 1) {
    tiles.push(board[blank.row][blank.col + 1]);
  }

  // Tile below.
  if (blank.row < puzzleSize - 1) {
    tiles.push(board[blank.row + 1][blank.col]);
  }

  return tiles;
}

function animateMoveTile(tile, targetTop, targetLeft) {
  // Get the tile's current top and left values.
  var currentTop = parseInt(tile.style.top, 10);
  var currentLeft = parseInt(tile.style.left, 10);

  var delta = 30;

  // Adjust the top or left property.
  if (currentTop !== targetTop) {
    if (Math.abs(targetTop - currentTop) <= delta) {
      currentTop = targetTop;
    }
    else if (currentTop < targetTop) {
      currentTop += delta;
    }
    else {
      currentTop -= delta;
    }
    tile.style.top = currentTop + 'px';
  }
  else if (currentLeft !== targetLeft) {
    if (Math.abs(targetLeft - currentLeft) <= delta) {
      currentLeft = targetLeft;
    }
    else if (currentLeft < targetLeft) {
      currentLeft += delta;
    }
    else {
      currentLeft -= delta;
    }
    tile.style.left = currentLeft + 'px';
  }

  // If we're not finished yet, call the function again in a few ms.
  if (currentTop !== targetTop || currentLeft !== targetLeft) {
    setTimeout(function () {
      animateMoveTile(tile, targetTop, targetLeft);
    }, 100);
  }
  else {
    // Finished?
    if (puzzleDone()) {
      done = true;
      doneOutput.textContent = "Done!";

      // Display the missing tile.
      var tilePosition = tilePositions[blank.row][blank.col];
      missingTile.style.top = tilePosition.top + 'px';
      missingTile.style.left = tilePosition.left + 'px';
      missingTile.classList.remove('hidden');
    }
  }
}

function updateScore() {
  scoreOutput.textContent = score;
}

// Move a tile into the blank space.
function moveTile(tile, animate) {
  // Update the internal representation of the board.
  var newBlankPos = {row: tile.row, col: tile.col};
  var newTilePos = {row: blank.row, col: blank.col};

  // Update the blank and the board.
  blank.row = newBlankPos.row;
  blank.col = newBlankPos.col;
  board[blank.row][blank.col] = null;

  // Update the tile and the board.
  tile.row = newTilePos.row;
  tile.col = newTilePos.col;
  board[tile.row][tile.col] = tile;

  // Move the tile.
  var tilePosition = tilePositions[tile.row][tile.col];
  if (animate) {
    animateMoveTile(tile, tilePosition.top, tilePosition.left);
  }
  else {
    tile.style.top = tilePosition.top + 'px';
    tile.style.left = tilePosition.left + 'px';
  }
}

function puzzleDone() {
  // Check every position on the board.
  for (var row = 0; row < puzzleSize; row++) {
    for (var col = 0; col < puzzleSize; col++) {

      // Get the
      var tile = board[row][col];

      // Check the item in this position belongs there.
      if (tile === null) {
        if (row !== blank.row || col !== blank.col) {
          return false;
        }
      } else if (tile !== tileElements[row][col]) {
        return false;
      }
    }
  }
  return true;
}

// Move the clicked tile, if possible.
function tileClicked() {
  if (done) return;

  // Check if the tile is movable.
  var moveableTiles = getMovableTiles();
  if (moveableTiles.includes(this)) {
    moveTile(this, true);
  }

  // Increase the score.
  score++;
  updateScore();
}

/**
 * Start a new game.
 */
function newGame(event) {
  var row, col;

  // Don't submit the form.
  event.preventDefault();

  // Get the selected image.
  var worldSelect = document.getElementById('world');
  var world = worldSelect.value;

  // Reset the puzzle.
  for (row = 0; row < puzzleSize; row++) {
    for (col = 0; col < puzzleSize; col++) {
      var tile = tileElements[row][col];

      // Move tile to its home position.
      tile.row = row;
      tile.col = col;

      // Update the style.
      tile.style.backgroundImage = 'url("images/' + world + '.jpg")';
      tile.style.top = tilePositions[row][col].top + 'px';
      tile.style.left = tilePositions[row][col].left + 'px';
      tile.classList.remove('hidden');

      // Add it to the board.
      board[row][col] = tile;
    }
  }

  // Remove a random tile from the board.
  blank.row = randInt(0, puzzleSize - 1);
  blank.col = randInt(0, puzzleSize - 1);
  board[blank.row][blank.col] = null;
  missingTile = tileElements[blank.row][blank.col];
  missingTile.classList.add('hidden');


  // Shuffle tiles around.
  for (var i = 0; i < 100; i++) {
    var movableTiles = getMovableTiles();
    tile = selectRandItem(movableTiles);
    moveTile(tile, false);
  }

  // Reset the score.
  score = 0;
  updateScore();

  // Check if the puzzle is done.
  done = puzzleDone();
  if (done) {
    // If the tiles are shuffled to form a completed game, shuffle them again.
    newGame(event);
  }
  else {
    doneOutput.textContent = '';
  }
}

function init() {
  // Initialise global arrays.
  board = [];
  tileElements = [];
  tilePositions = [];

  // Create the 9 tiles and cache their elements.
  for (var row = 0; row < puzzleSize; row++) {

    // Initialise column arrays.
    board[row] = [];
    tileElements[row] = [];
    tilePositions[row] = [];

    for (var col = 0; col < puzzleSize; col++) {

      // Create the tile.
      var tile = document.createElement('div');
      tile.id = 'tile-' + row + '-' + col;
      tile.className = 'tile';
      document.body.appendChild(tile);

      // Add the click handler.
      tile.onclick = tileClicked;

      // Store the tile's current location.
      tile.row = row;
      tile.col = col;

      // Add it to the board.
      board[row][col] = tile;

      // Cache the tile element.
      tileElements[row][col] = tile;

      // Remember the tile home positions.
      var tileSpace = document.getElementById('tile-space-' + row + '-' + col);
      var rect = tileSpace.getBoundingClientRect();
      var top = Math.round(rect.top);
      var left = Math.round(rect.left);
      tilePositions[row][col] = {top: top, left: left};

      // Initialise the tile position.
      tile.style.top = top + 'px';
      tile.style.left = left + 'px';
    }
  }

  // Set up the "New game" button.
  document.getElementById('new-game-btn').onclick = newGame;

  // Get a reference to outputs.
  scoreOutput = document.getElementById('score');
  doneOutput = document.getElementById('done');
}

// Do stuff when the page is loaded.
onload = init;
