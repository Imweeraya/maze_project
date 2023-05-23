<?php
 $img = $_GET['img'];
 $count_Cupcake = $_GET['cupcake'];
 ?>

<html>
    
<?php  echo $count_Cupcake ?>
<?php  echo $img ?>

<table id="scoreboard">
  <tr>
    <th>Rank</th>
    <th>Name</th>
    <th>Score</th>
  </tr>
</table>
<button id="deleteButton">Delete All</button>
</html>

<script>
   // Retrieve existing scores from local storage or initialize an empty array
let scores = JSON.parse(localStorage.getItem('scores')) || [];

// Function to add a new score
function addScore(name, score) {
  scores.push({ name, score });
  localStorage.setItem('scores', JSON.stringify(scores));
}

// Function to delete all scores
function deleteScores() {
  scores = [];
  localStorage.removeItem('scores');
  displayScoreboard();
}

// Function to display the score board
function displayScoreboard() {
  // Sort scores in descending order
  scores.sort((a, b) => b.score - a.score);

  // Clear existing scoreboard
  const scoreboard = document.getElementById('scoreboard');
  scoreboard.innerHTML = '';

  // Display each score
  scores.forEach((score, index) => {
    const row = document.createElement('tr');
    const rank = document.createElement('td');
    const name = document.createElement('td');
    const scoreCell = document.createElement('td');

    rank.textContent = index + 1;
    name.textContent = score.name;
    scoreCell.textContent = score.score;

    row.appendChild(rank);
    row.appendChild(name);
    row.appendChild(scoreCell);

    scoreboard.appendChild(row);
  });
}

// Example usage
addScore('John', 100);
addScore('Jane', 200);
addScore('Alex', 150);

displayScoreboard();

// Attach event listener to the delete button
const deleteButton = document.getElementById('deleteButton');
deleteButton.addEventListener('click', deleteScores);
</script>