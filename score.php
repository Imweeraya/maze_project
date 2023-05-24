<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-score.css">
</head>

<body>
  <main>
    <div id="header">
      <h1>History</h1>
    </div>

    <div id="leaderboard">
      <table id="table">
        <!--
        <tr>
          <td class="img-pop">
            <img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/36-2.thumb128.png">
          </td>
          <td class="cake">
            <img src="https://static.vecteezy.com/system/resources/previews/019/606/495/non_2x/cupcake-graphic-clipart-design-free-png.png">
            5/10
          </td>
          <td class="time">
            258.244
          </td>
        </tr>
        -->
      </table>

      <div id="buttons">
        <button class="exit">Exit</button>
      </div>
    </div>
  </main>

  <script>
    var data = {
      img: "",
      cake: "",
      time: "",
    };

    var board = document.getElementById("table");

    fetch('https://crudcrud.com/api/5d9aaf67d5e94fdc88f93375da4c1830/maze2')
      .then(function(response) {
        return response.json();
      })
      .then(function(maze) {
        console.log(maze.length)
        if(maze.length>=5){
          for (var i = maze.length-5; i <= maze.length; i++) {
          console.log(i)
          data.img = maze[i].img;
          data.cake = maze[i].cake;
          data.time = maze[i].time;

          var todoItemElm = htmlToElem(
            `<tr class="row">
              <td class="img-pop">
                <img src="${data.img}">
              </td>
              <td class="cake">
                <img src="https://static.vecteezy.com/system/resources/previews/019/606/495/non_2x/cupcake-graphic-clipart-design-free-png.png">
                ${data.cake}/10
              </td>
              <td class="time">
                ${data.time}
              </td>
            </tr>
          `);

          board.appendChild(todoItemElm);
        }
        }else{
          for (var i = 0; i <= maze.length; i++) {
          console.log(i)
          data.img = maze[i].img;
          data.cake = maze[i].cake;
          data.time = maze[i].time;

          var todoItemElm = htmlToElem(
            `<tr class="row">
              <td class="img-pop">
                <img src="${data.img}">
              </td>
              <td class="cake">
                <img src="https://static.vecteezy.com/system/resources/previews/019/606/495/non_2x/cupcake-graphic-clipart-design-free-png.png">
                ${data.cake}/10
              </td>
              <td class="time">
                ${data.time}
              </td>
            </tr>
          `);

          board.appendChild(todoItemElm);
        }
        }
      })
      .catch(function(error) {
        console.log('Error:', error);
      });

    function htmlToElem(htmlString) {
      var template = document.createElement('template');
      htmlString = htmlString.trim();
      template.innerHTML = htmlString;
      return template.content.firstChild;
    }
  </script>
</body>

</html>
