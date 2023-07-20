// fetch('https://balldontlie.io/api/v1/players')
//   .then(response => response.json())
//   .then(data => console.log(data))

var players=[];

fetch('players.json')
.then(response => response.json())
.then(data => players.push(data))

console.log(players);

return players;